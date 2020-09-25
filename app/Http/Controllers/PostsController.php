<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$posts = Post::orderBy('created','Desc')->get();
       $posts = Post::orderBy('created_at','Desc')->paginate(9);
        return view('posts.index')->with('posts', $posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
            'title' => 'required', 
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        
        ]); 

        // Uploaded File Handling

        if($request->hasFile('cover_image')){
            //Get the File name with the Extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just the Filename
            $filename = pathinfo($fileNameWithExt,  PATHINFO_FILENAME);
            //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload the Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        // Insert Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/dashboard')->with('success','Post Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post = Post::findOrFail($id);
       return view('posts.show')->with('posts', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (auth()->user()->id !== $post->user_id){
         return redirect('/posts')->with('error', 'Page not found!');
        }
        return view('posts.edit')->with('posts', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 
            'title' => 'required', 
            'description' => 'required' 
            ]); 

            if($request->hasFile('cover_image')){
                //Get the File name with the Extension
                $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
                //Get just the Filename
                $filename = pathinfo($fileNameWithExt,  PATHINFO_FILENAME);
                //Get just the extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //Filename to Store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload the Image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }

            
            // Insert Post
            $post = Post:: find($id);
            $post->title = $request->input('title');
            $post->description = $request->input('description');

            if($request->hasFile('cover_image')){
                if($post->cover_image != 'noimage.jpg') {
                    Storage::delete('public/cover_images/' . $post->cover_image);
                }
                $post->cover_image = $fileNameToStore;
            }
            // if($request->hasFile('cover_image')){
            //     $post->cover_image = $fileNameToStore;
            // }
            $post->save();
            return redirect('/posts')->with('success','Post Updated Successfully!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post:: find ($id);
        if (auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Page not found!');
        }
        if ($post->cover_image !== 'noimage.jpg') {
            // Delete the Image
            Storage::delete('public/cover_images/'.$post->cover_image);

        }
        $post->delete();
        return redirect('/posts')->with('success','Post Removed Successfully!');
    }
}
