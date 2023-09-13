<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Professor;
use Hash;
use Session;


class AccountInfo extends Controller
{
    public function accountinfo()
    {
        $data=array();
        if(Session::has('loginId')){

            $data=User::where('id','=', Session::get('loginId'))->first();
                    }

	    return view('ojtCoordinator.accountinfo', compact('data'));

    }

    public function edit(Request $request,$email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
        $professor = Professor::where('email', $email)->first();
    
        if (!$professor) {
            return back()->with('error', 'Professor not found.');
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
    
        // Update professor data
        $professor->full_name = $user->full_name;
    
        $professor->save();
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

    }

    public function change_password(Request $request,$id){

        $request->validate([
            
            'current_password'=>'required|min:8|max:12',
            'confirm_password'=>'required|min:8|max:12',
            'new_password'=>'required|min:8|max:12'
    ]);
        $user=User::find($id);

        $user->password = Hash::make($request->new_password);
        
       
            
            $user->Save();

            return back()->with('success','You have updated the information successfully!');

    }


    public function profAcc()
    {
        $data=array();
        if(Session::has('loginId')){

            $data=User::where('id','=', Session::get('loginId'))->first();
                    }

	    return view('professor.profAcc', compact('data'));

    }
}
