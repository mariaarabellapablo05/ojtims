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
    
    if($data->status == 0){
    // Assuming you have logic to retrieve the professor and students data
    $course = Classes::where('course', $courseName)->first();
    
    
    
    $students = User::where('course', $course->course)->where('status', 1)->get();;


    // Pass the $course and $students variables to the view
    return view('professor.classList', compact('course', 'students', 'data'));
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


    
}
