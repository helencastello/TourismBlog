<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerPage() {
        if(Auth::check()){
            return redirect()->route('home.page');
        }
        return view('register');
    }

    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required'
        ]);

        $user = new User;
        $user->role = 'User';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }

    public function loginPage() {
        if(Auth::check()){
            return redirect()->route('home.page');
        }
        return view('login');
    }

    public function login(Request $request){
        $remember_me = $request->rememberMe ? true : false;

        $account = $request->only('email', 'password', 'role');

        if(Auth::attempt($account)){
            if($remember_me == true){
                Cookie::queue('userEmail',$request->email,'120');
            }
            return redirect()->route('home.page');
        }else{
            $error_message = 'Insert valid credential!';
            return view('login', ['error_message' => $error_message]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.page');
    }

}
