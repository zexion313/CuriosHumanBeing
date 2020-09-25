@extends('layouts.headlayout')

@section('content')
<h1>Edit Post</h1>

<form enctype="multipart/form-data" action="{{ route('posts.update' , $posts->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="form-group">

        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$posts->title}}" />
        </input>
        <div class="form-group"><br>
            <label for="description">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="10"
                placeholder="Description">{{$posts->description}}</textarea>
        </div>
        <small>
            <p><b>700x350 image dimension is recommended*.</b></p>
        </small>
        <div class="form-group">
            <input type="file" id="myfile" name="cover_image"><br><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@extends('layouts.footer')