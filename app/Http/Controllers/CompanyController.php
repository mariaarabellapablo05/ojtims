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
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function companies($course, $school_year)
{
    $user=array();
        if(Session::has('loginId')){
    
            $user=User::where('id','=', Session::get('loginId'))->first();
                    }

// Store the values in the session
session(['course' => $course, 'school_year' => $school_year]);

    // Get the list of courses
    $courses = Courses::all();

    // Get the list of companies based on the selected course and school year
    $companies = Company::where('course', $course) // Use $course here
        ->where('school_year', $school_year)
        ->get();

    return view('ojtCoordinator.companies', compact('courses', 'companies','user'));

}



public function companyCreate(Request $request)
{
    $data = [];

    if (Session::has('loginId')) {
        $data = User::where('id', '=', Session::get('loginId'))->first();
    }

// In the companyCreate method of CompanyController
$schoolYear = Session::get('school_year');
$course = Session::get('course');

$com = new Company();
$com->school_year = $schoolYear;
$com->course = $course;
$com->company_name = $request->company_name;
$com->company_address = $request->company_address;
$com->company_rep = $request->company_rep;
$com->companyNo = $request->companyNo;
$com->company_email = $request->company_email;






    $res = $com->save();

    if ($res) {
        return back()->with('success', 'You have registered successfully!');
    } else {
        return back()->with('fail', 'Oh no! Something went wrong.');
    }
}
}
