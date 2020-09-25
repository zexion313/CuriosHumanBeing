<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
       return view ('/dashboard' , compact('user'))->with('posts', $user->posts()->orderByDesc('created_at')->paginate(5));
        // return view('dashboard')->with('posts', $user->posts);
    }
}
