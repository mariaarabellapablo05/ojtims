<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hash;
use Mail;
use Session;
use App\Models\User;
use App\Models\Classes;
use App\Mail\SendFileNotif;
Use App\Mail\TemporaryPasswordNotification;
use App\Models\Company;
use App\Models\Courses;
use App\Models\MOAUpload;
use App\Models\Professor;
use App\Models\CoursePerSY;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;

class MOAUploadController extends Controller
{
    public function moaUploadPage($course, $school_year,$company_name)
    {
        $user=array();
        if(Session::has('loginId')){
    
            $user=User::where('id','=', Session::get('loginId'))->first();
                    }
    
        // Store the values in the session
session(['course' => $course, 'school_year' => $school_year, 'company_name' => $company_name]);

// Get the list of courses
$courses = Courses::all();

// Get the list of companies based on the selected course and school year
$moa = MOAUpload::where('course', $course) // Use $course here
    ->where('school_year', $school_year)
    ->where('company_name', $company_name)
    ->get();
    
    
        return view('ojtCoordinator.moaUP', compact('courses', 'moa','user'));
    
    }

    public function uploadfile(Request $request)
    {
        $data = [];

        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
    
    // In the companyCreate method of CompanyController
    $schoolYear = Session::get('school_year');
    $course = Session::get('course');
    $company_n = Session::get('company_name');
    $expirationDate = now()->addYears(3);

    $data = new MOAUpload();
    $file = $request->file;
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $request->file->move('assets', $filename);
    $data->file = $filename;
    $data->file_name = $request->file_name;
    $data->student_name = $request->student_name;
    $data->school_year = $schoolYear;
    $data->course = $course;
    $data->company_name = $company_n;
    $data->valid_until = $expirationDate; // Set the expiration date
    
    $data->save();

        return redirect()->back();

    }

    public function download(Request $request, $file)
    {   
	    $fileRecord = MOAUpload::where('file', $file)->first();

    if ($fileRecord) {
        // Check if the file is still valid
        if ($fileRecord->valid_until && now()->gt($fileRecord->valid_until)) {
            // File has expired, return a response indicating that
            return response()->json(['message' => 'File has expired'], 403);
        }

        // File is valid, allow download
        return response()->download(public_path('assets/' . $file));
    }

    // File not found, return a response indicating that
    return response()->json(['message' => 'File not found'], 404);

    }

    public function remove($id)
    {

        $data=MOAUpload::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function view($id)
    {

        $data=MOAUpload::find($id);

        return view('ojtCoordinator.MOAview',compact('data'));
    }


    public function sendFiles(Request $request){
       
        $request->validate([
            'email' => 'required|email',
            'file_id', // Make sure the file exists in the 'moa_uploads' table
        ]);
    
        $fileId = $request->input('file_id');
        $file = MOAUpload::find($fileId);
    
        if (!$file) {
            return back()->with('error', 'File not found.');
        }
        
        $validUntilFromDatabase=$file->valid_until;
        $createdAt = Carbon::parse($validUntilFromDatabase);
        $attachmentPath = $createdAt->format('F j, Y \a\t g:i A'); 
    
        try {
            Mail::to($request->email)->send(new SendFileNotif($attachmentPath, $file->file));
    
            return back()->with('success', 'Email sent with file attachment.');
        } catch (\Exception $e) {
            \Log::error('Email sending error: ' . $e->getMessage());
            return back()->with('error', 'Email sending failed.');
        }
    
    }

    public function downloadFile($file)
{
    $fileRecord = MOAUpload::where('file', $file)->first();

    if ($fileRecord) {
        // Check if the file is still valid
        if ($fileRecord->valid_until && now()->gt($fileRecord->valid_until)) {
            // File has expired, return a response indicating that
            return response()->json(['message' => 'File has expired'], 403);
        }

        // File is valid, allow download
        $filePath = public_path('assets/' . $file);
        $headers = [
            'Content-Type' => 'application/pdf', // Adjust the content type as needed
        ];

        return response()->download(public_path('assets/' . $file));
    }

    // File not found, return a response indicating that
    return response()->json(['message' => 'File not found'], 404);
}






}
