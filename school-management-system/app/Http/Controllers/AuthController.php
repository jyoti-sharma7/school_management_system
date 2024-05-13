<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
  public function login()
  {
    if (!empty(Auth::check())) {
      if (Auth::user()->user_type == 1) {
        return redirect('admin/dashboard');
      } else if (Auth::user()->user_type == 2) {
        return redirect('teacher/dashboard');
      } else if (Auth::user()->user_type == 3) {
        return redirect('student/dashboard');
      } else if (Auth::user()->user_type == 4) {
        return redirect('parent/dashboard');
      }
    }
    //  dd(Hash::make(123456));
    return view('auth.login');
  }
  public function Authlogin(Request $request)
  {
    $remember = !empty($request->remember) ? true : false;
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

      if (Auth::user()->user_type == 1) {
        return redirect('admin/dashboard');
      } else if (Auth::user()->user_type == 2) {
        return redirect('teacher/dashboard');
      } else if (Auth::user()->user_type == 3) {
        return redirect('student/dashboard');
      } else if (Auth::user()->user_type == 4) {
        return redirect('parent/dashboard');
      }
    } else {
      return redirect()->back()->with('error', 'Please enter correct email and password');

    }
    //dd($request->all());
  }

  public function forgotpassword()
  {
    return view('auth.forgot');

  }
  public function PostForgotPassword(Request $request)
  {
    $user = User::getEmailSingle($request->email);
    if (!empty($user)) {
      $user->remember_token = Str::random(30);
      $user->save();
      Mail::to($user->email)->send(new ForgotPasswordMail($user));
      return redirect()->back()->with('success', "Please check your email");
    } else {
      return redirect()->back()->with('error', "Email not found");
    }
  }

  public function reset($remember_token){
    $user=User::getTokenSingle($remember_token);
    if(!empty($user))
    {
      $data['user']=$user;
      return view('auth.reset',$data);


    }
    else{
      abort(404);
    }
    
  }
public function PostReset($token,Request $request){
  if($request->password==$request->cpassword)
  {
    $user=User::getTokenSingle($token);
$user->password= Hash::make($request->password);
$user->remember_token = Str::random(30);

$user->save();
return redirect(url(''))->with('success',"Password successfully reset");
  }
  else
  {
    return redirect()->back()->with('error', "Password and confirm password doesn't match.");
  
  }
}
  public function logout()
  {
    Auth::logout();
    return redirect(url(''));
  }
}
