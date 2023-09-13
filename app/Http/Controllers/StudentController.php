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
use Illuminate\Http\Request;
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


}
