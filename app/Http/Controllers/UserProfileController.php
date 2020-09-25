<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;

class UserProfileController extends Controller
{
    
    public function index($username)
    {   
        $user = User::whereUsername($username)->firstOrFail();
        return view ('profile.index' , compact('user'))->with('posts', $user->posts()->orderByDesc('created_at')->paginate(5));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 
            'name' => 'required',  
            'phone' => 'required',  
            'username' => 'required',
            'bio' => '',
            'email' => 'required|email' 
            ]); 

            if($request->hasFile('avatars')){
                //Get the File name with the Extension
                $fileNameWithExt = $request->file('avatars')->getClientOriginalName();
                //Get just the Filename
                $filename = pathinfo($fileNameWithExt,  PATHINFO_FILENAME);
                //Get just the extension
                $extension = $request->file('avatars')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload the Image
                $path = $request->file('avatars')->storeAs('public/avatars', $fileNameToStore);
            }

            // Insert Post
            $user = User:: find($id);
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->bio = $request->input('bio');

            if($request->hasFile('avatars')){
                if($user->avatar != 'default.jpg') {
                    Storage::delete('public/avatars/' . $user->avatar);
                }
                $user->avatar = $fileNameToStore;
            }

            $user->save();
            return redirect('/dashboard')->with('success','Account Updated Successfully!');
    }

}
