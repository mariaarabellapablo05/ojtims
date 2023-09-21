<?php

namespace App\Http\Controllers;

use Hash;
use Mail;
use Session;
use App\Models\User;
use App\Models\Classes;
Use App\Mail\TemporaryPasswordNotification;
use App\Models\Courses;
use App\Models\Professor;
use Illuminate\Support\Str;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use App\Models\OJTInformation;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    
    public function class()
    {   
        $course=Courses::all();
        $professor=Professor::all();

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
    
       
           $class = Classes::where('adviser_name', $data->full_name)->get();


    // Pass the $professor and $students variables to the view
    return view('professor.class', compact('data','course','class','professor'));

}

    
public function show($courseName)
{
    $data = array();
    
    if (Session::has('loginId')) {
        $data = User::where('id', Session::get('loginId'))->first();
    }
    
    if($data->status == 0){
    // Assuming you have logic to retrieve the professor and students data
    $course = Classes::where('course', $courseName)->first();
    
    
    
    $students = User::where('course', $course->course)->where('status', 3)->get();;


    // Pass the $course and $students variables to the view
    return view('professor.listStudents', compact('course', 'students', 'data'));
}
    

}
public function roomCreate(Request $request){

    
    $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }

$room =new Classes();
$room->room = $request->room;
$room->course = $request->course;
$room->adviser_name = $data->full_name;




$res = $room->save();

if($res){
    return back()->with('success','You have registered successfully!');
}
else{
    return back()->with('fail','Oh no! Something went wrong.');
}
}

public function show_list($courseName)
{
    $data = array();

    if (Session::has('loginId')) {
        $data = User::where('id', Session::get('loginId'))->first();
    }

    if ($data->status == 0) {
        // Assuming you have logic to retrieve the professor and students data
        $course = Classes::where('course', $courseName)->first();

        if (!$course) {
            // Handle the case where the course doesn't exist
            return redirect()->back()->with('error', 'Course not found.');
        }

        $students = User::where('course', $course->course)->where('status', 1)->get();

        $studentData = [];

        foreach ($students as $student) {
            $ojt = OJTInformation::where('studentNum', $student->studentNum)->first();
            
            // Add the student and associated OJT information to the data array
            $studentData[] = [
                'student' => $student,
                'ojt' => $ojt,
            ];
        }

        // Pass the $course and $students variables to the view
        return view('professor.classList', compact('course', 'studentData', 'data'));
    }
}

    



public function approve(Request $request,$email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
    
        // Update user data

        $user->status = 1;
    
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

    }

    
    public function deny(Request $request,$email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
    
        // Update user data

        $user->status = 2;
    
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

        
    }

    public function uploadP()
    {   
               // Get the currently logged-in user's name
               $user=array();
               if(Session::has('loginId')){
       
                   $user=User::where('id','=', Session::get('loginId'))->first();
                           }
       
        $userName=$user->full_name;
    // Fetch data from the database where the uploader_name matches the currently logged-in user's name
    $data = UploadedFile::where('uploader_name', $userName)->get();

    return view('professor.uploadt', compact('data','user'));

}


    
}
