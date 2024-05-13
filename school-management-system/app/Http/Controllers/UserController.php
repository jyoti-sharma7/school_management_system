<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\Models\User;
use Hash;
class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }
    public function update_change_password(Request $request){

        $user=User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success',"Password successfully updated");
        }
        {
            return redirect()->back()->with('error',"Old password doesn't match");
        }
    }
}
