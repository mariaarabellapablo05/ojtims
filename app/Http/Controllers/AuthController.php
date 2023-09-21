<?php

namespace App\Http\Controllers;

use Hash;
use Mail;
use Session;
use App\Models\User;
use App\Models\Courses;
use App\Models\Professor;
Use App\Mail\TemporaryPasswordNotification;
use Illuminate\Support\Str;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\OJTInformation;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        $data=Professor::all();
        $course=Courses::all();

    return view('auth.registration', compact('data','course'));
        
    }

    public function registerUser(Request $request){
        
        $request->validate([
            
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email|unique:users,email',
                'studentNum'=>'required',
                'password'=>'required|min:8|max:12'
        ]);
        $student = new OJTInformation();
        $user =new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->studentNum = $request->studentNum;
        $user->course= $request->course;
        $user->year_and_section= $request->year_and_section;
        $user->adviser_name = $request->adviser_name;
        $user->password = Hash::make($request->password);
        $user->full_name = $user->first_name . ' ' . $user->last_name;
        $student->studentNum =  $user->studentNum;
        $res = $user->save();
        $student->save();
        
        if($res){
            return back()->with('success','You have registered successfully!');
        }
        else{
            return back()->with('fail','Oh no! Something went wrong.');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            
            'email'=>'required',
            'password'=>'required'
                    ]);
            $user = User::where('email','=',$request->email)->first();

            if($user){
                if(Hash::check($request->password, $user->password)){
                    $request->session()->put('loginId',$user->id);
                    if ($user->role == 0) {
                        return redirect()->route('student_home');
                    } 
                    
                    else if ($user->role == 2) {
                        return redirect()->route('professor_home');
                    }
                    
                    
                    
                    else if($user->role == 1) {
                        return redirect('dashboard');
                    }

                        else {
                        return redirect('/supervisor/home');
                         }
                    
                }
                else{
                    return back()->with('fail','Oh no! The Password does not match.');
                }
                
            }
            else{
                return back()->with('fail','Oh no! The email is not registered.');
            }
    }

    public function dashboard(){

        $roleCount = User::where('role', 0)->count();
        $roleCountP = User::where('role', 2)->count();
        
        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }

                        $userName=$data->full_name;
                        $fileCount = UploadedFile::where('uploader_name', $userName)->count();
    
        return view('ojtCoordinator.dashboard', compact('data','roleCount','roleCountP','fileCount'));
    
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }


    public function professorTab(){
        $user=array();
        if(Session::has('loginId')){
    
            $user=User::where('id','=', Session::get('loginId'))->first();
                    }
        $data=Professor::all();

    return view('ojtCoordinator.professorTab', compact('data','user'));
    }


    public function professorCreate(Request $request){



        $request->validate([
            
            'email'=>'required|email|unique:users,email',

    ]);

    $temporaryPassword = Str::random(8);
    $user =new User();
    $professor =new Professor();
    $professor->email = $request->email;
    $user->email = $request->email;
    $user->password = Hash::make($temporaryPassword);
    $user->role = 2;
    Mail::to($user->email)->send(new TemporaryPasswordNotification($temporaryPassword));
    

    $professor->save();
    $res = $user->save();

    if($res){
        return back()->with('success','You have registered successfully!');
    }
    else{
        return back()->with('fail','Oh no! Something went wrong.');
    }
    }

    public function student_home(){
        $data=array();
        if(Session::has('loginId')){

            $user=User::where('id','=', Session::get('loginId'))->first();
                    }
        $data = Announcements::where(function ($query) use ($user) {
            $query->where('announcer', 'Gina Dela Cruz')
                  ->orWhere('announcer', $user->adviser_name);
                })
                ->get();
                $fileCount = UploadedFile::where(function ($query) use ($user) {
                    $query->where('uploader_name', 'Gina Dela Cruz')
                          ->orWhere('uploader_name', $user->adviser_name);
                        })
                        ->count();
     

        return view('students.student_home', compact('data','user','fileCount'));
        }

    public function professor_home(){
        $roleCount = User::where('role', 0)->count();

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
                        $userName=$data->full_name;
                        $fileCount = UploadedFile::where('uploader_name', $userName)->count();
    
        return view('professor.home', compact('data','roleCount','fileCount'));

            
            }



    public function sup_home(){

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
        return view('ojtSupervisor.sup_home', compact('data'));
   }
        

   public function supTab(){
    $user=array();
        if(Session::has('loginId')){
    
            $user=User::where('id','=', Session::get('loginId'))->first();
                    }
    $data=User::where('role', 3)->get();

return view('professor.supTab', compact('data','user'));
}

   public function supCreate(Request $request){



    $request->validate([
        
        'email'=>'required|email|unique:users,email',

]);

$temporaryPassword = Str::random(8);
$user =new User();
$user->email = $request->email;
$user->password = Hash::make($temporaryPassword);
$user->role = 3;
Mail::to($user->email)->send(new TemporaryPasswordNotification($temporaryPassword));



$res = $user->save();

if($res){
    return back()->with('success','You have registered successfully!');
}
else{
    return back()->with('fail','Oh no! Something went wrong.');
}
}



    
}
