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
use App\Models\Announcements;

class AnnouncementController extends Controller
{
    public function announcement(Request $request)
    {
        
        $user=array();
        if(Session::has('loginId')){

            $user=User::where('id','=', Session::get('loginId'))->first();
                    }


        $data=new Announcements();

        $data->title=$request->title;
        $data->content=$request->content;
        $data->announcer=$user->full_name;

        $data->save();

        return redirect()->back();

    }
    
}
