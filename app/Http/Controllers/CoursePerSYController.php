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
use App\Models\CoursePerSY;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursePerSYController extends Controller
{
    public function coursesSY()
    {   
        $course=Courses::all();
      

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
    
       
           $class = CoursePerSY::all();


    // Pass the $professor and $students variables to the view
    return view('ojtCoordinator.coursesSY', compact('data','course','class'));

}

public function courseCreate(Request $request)
{
    $data = [];

    if (Session::has('loginId')) {
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }

    $room = new CoursePerSY();
    
    // Combine start and end years into a single field
    $startYear = $request->input('start_year');
    $endYear = $request->input('end_year');
    $schoolYear = $startYear . '-' . $endYear;

    $room->school_year = $schoolYear; // Store the combined school year
    $room->course = $request->input('course');

    $res = $room->save();

    // After saving the course in CoursePerSYController
Session::put('school_year', $schoolYear);
Session::put('course', $request->input('course'));

    if ($res) {
        return back()->with('success', 'You have registered successfully!');
    } else {
        return back()->with('fail', 'Oh no! Something went wrong.');
    }

}
}
