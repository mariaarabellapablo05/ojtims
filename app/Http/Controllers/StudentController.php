<?php

namespace App\Http\Controllers;

use Hash;
use Mail;
use Session;
use App\Models\User;
use App\Models\Classes;
use App\Models\Courses;
Use App\Mail\TemporaryPasswordNotification;
use App\Models\Professor;
use Illuminate\Support\Str;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use App\Models\OJTInformation;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function student_acc()
    {
        $course=Courses::all();
        $data=array();
        if(Session::has('loginId')){

            $data=User::where('id','=', Session::get('loginId'))->first();
                    }

	    return view('students.student_account', compact('data','course'));

    }
    public function edit(Request $request,$email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
    
        // Update user data
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->full_name = $user->first_name . ' ' . $user->last_name;
        $user->suffix = $request->suffix;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->date_of_birth = $request->date_of_birth;
        $user->course = $request->course;
        $user->year_and_section = $request->year_and_section;
        $user->studentNum = $request->studentNum;
        $user->email = $request->email;
    
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

    }

    public function class()
    {   
        $course=Courses::all();
        $professor=Professor::all();
        

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
                        
    
       
           $class = Classes::where('adviser_name', $data->adviser_name)->get();


    // Pass the $professor and $students variables to the view
    return view('students.student_class', compact('data','course','class','professor'));

}


public function join(Request $request,$email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
    
        // Update user data

        $user->status = 3;
    
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

    }

    public function fileSee()
    {   

        

        $data=array();
            if(Session::has('loginId')){

                $user=User::where('id','=', Session::get('loginId'))->first();
                        }
                        
    
       
           $class = Classes::where('adviser_name', $user->adviser_name)->get();
            // Fetch and display the templates where Uploader_name matches adviser_name
    $upload = UploadedFile::where(function ($query) use ($user) {
        $query->where('uploader_name', 'Gina Dela Cruz')
              ->orWhere('uploader_name', $user->adviser_name);
    })
    ->get();

    


    // Pass the $professor and $students variables to the view
    return view('students.student_file', compact('data','upload','class','user'));

}

public function StuList(){


    $user=array();
    if(Session::has('loginId')){

        $user=User::where('id','=', Session::get('loginId'))->first();
                }

    $students = User::where('role', 0)->get();

    $studentData = [];

    foreach ($students as $student) {
        $ojt = OJTInformation::where('studentNum', $student->studentNum)->first();
        
        // Add the student and associated OJT information to the data array
        $studentData[] = [
            'student' => $student,
            'ojt' => $ojt,
        ];
    }

    return view('ojtCoordinator.students', compact('studentData', 'user'));

}


public function ojtInformation()
{
    $course=Courses::all();
    $data=array();
    if(Session::has('loginId')){

        $data=User::where('id','=', Session::get('loginId'))->first();
                }
                $user = OJTInformation::where('studentNum', $data->studentNum)->first();

    return view('students.ojtinfo', compact('data','course','user'));

}
public function ojt_edit(Request $request,$studentNum)
    {

        $data=array();
        if(Session::has('loginId')){
    
            $data=User::where('id','=', Session::get('loginId'))->first();
                    }
    
        $user = OJTInformation::where('studentNum', $data->studentNum)->first();


    
    
        // Update user data
        $user->company_name = $request->company_name;
        $user->company_address = $request->company_address;
        $user->nature_of_bus = $request->nature_of_bus;
        $user->nature_of_link = $request->nature_of_link;
        $user->level = $request->level;
        $user->start_date = $request->start_date;
        $user->finish_date = $request->finish_date;
        $user->contact_name = $request->contact_name;
        $user->report_time = $request->report_time;
        $user->contact_position = $request->contact_position;
        $user->contact_number = $request->contact_number;
    
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

    }


}
