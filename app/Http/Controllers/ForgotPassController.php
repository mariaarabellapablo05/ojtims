<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Professor;
use App\Models\Courses;
use Illuminate\Support\Str;
Use App\Mail\TemporaryPasswordNotification;
Use App\Mail\ForgotPassNotif;
use Hash;
use Session;
use Mail;

class ForgotPassController extends Controller
{
    public function resetP(){
        return view("auth.reset");
    }

    public function forgotP(){
        return view("auth.forgot");
    }


    public function forgotPass(Request $request){


        $request->validate([
            'email' => 'required|email',
        ]);
        
    
        $temporaryPassword = Str::random(8);
        $userEmail = $request->email;
    
        Mail::to($userEmail)->send(new ForgotPassNotif());
    
      
            return back()->with('success', 'Email sent successfully!');
        
    }

    public function resetPass(Request $request){


        $request->validate([
            'email' => 'required|email',
            'confirm_password' => 'required',
        ]);
    
        $user = User::where('email', $request->input('email'))->first();
    
        if (!$user) {
            return back()->with('fail', 'Email not found');
        }
    
        $user->password = Hash::make($request->password);
        $res = $user->save();
        
        if($res){
    
        return back()->with('success', 'Password reset successfully! Check your email for the new password.');
    }
    else{
        return back()->with('fail','Oh no! Something went wrong.');
    }
    }
    
    
}
