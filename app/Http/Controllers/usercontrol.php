<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class usercontrol extends Controller
{
    

    public function register(){
 
        return view('register');

    }

    public function login(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        $row = DB::table("users")->where('email',$email)->where('password',$pass)->first();
        if($row)
        {
         return view('welcome',['name' =>$row->name]);
        }
        else {
           echo "wrong email or password";
        }
    }
    
    public function welcome(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return view('welcome',['name' =>$user->name]);
    }
}
