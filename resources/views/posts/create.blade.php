@extends('layouts.headlayout')

@section('content')
<h1>Create Post</h1>
<form method="post" enctype="multipart/form-data" action="{{ route('posts.store') }}">
    <div class="form-group">
        @csrf
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
    </div>

    <small>
        <p><b>600x300 image dimension is recommended*.</b></p>
    </small>

    <div class="form-group">
        <h1 class="dan">asd</h1>
        <input type="file" id="myfile" name="cover_image"><br><br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@extends('layouts.footer')