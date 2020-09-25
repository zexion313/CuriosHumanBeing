<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CustomLogin;

class CustomAuthController extends Controller
{
     public function showLoginForm()
    {
        return view('pages/adminlogin');
    }

    public function Login(Request $request)
    {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);
        if(Auth::attempt(['username'=>$request, 'password'=>$request])){
                return view('pages/admindash');
        }
        return view('pages/admindash');
       
    }
    

    public function dashboard()
    {
        return view('pages/admindash');
    }
}