<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request):mixed 
    {
        $userdata = User::where(['email'=>$request->email])->first();
        if(!$userdata || !Hash::check($request->password,$userdata->password))
        {
            return "Username or password is not matched";
        }

        else{
            
            $request->session()->put('user',$userdata);
            return redirect('/');
        }
    }


    public function logout()
    {
        Session()->forget('user');
        return view('login');
    }

    public function register(Request $req)
    {
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('/index');
    }
}
