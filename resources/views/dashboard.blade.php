@extends('layouts.app')

@section('content')
<style type="text/css">
    .profile-img {
        max-width: 65%;
        border-radius: 100%;
        border: 5px solid #ffff;
        box-shadow: 0.3px 0.3px 1.2px 1.2px;
        margin-left: 17%;
    }

    .profile-img-edit {
        max-width: 100%;
    }

    .image-upload>input {
        display: none;
    }

    .mt1 {
        margin-top: 80px;
    }

    .mb1 {
        margin-bottom: 80%;
    }

    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        display: block;
        margin: 0 auto;
        width: 65%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
        border: 3px;
        box-shadow: 0.3px 0.3px 1.2px 1.2px;
    }

    .profile-usertitle {
        text-align: center;

    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 20px;
        font-weight: 600;
    }

    .profile-usertitle-job {
        color: #5b9bd1;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .profile-usertitle-bio {
        font-style: italic;
        color: black;
        font-size: 13px;
        font-weight: 200;
        margin-bottom: 10px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 15px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }

    /* Profile Content End */
</style>
<div class="container mt1">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="/storage/avatars/{{ Auth::user()->avatar }}" class="img-responsive" alt="">
                </div>
                <h5>
                    <center>
                        <div class="badge badge-primary mt-2"><span>@</span>{{Auth::user()->username}}</div>
                    </center>
                </h5>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{Auth::user()->name}}
                    </div>
                    <div class="profile-usertitle-job">
                        {{Auth::user()->email}}
                    </div>
                    <div class="profile-usertitle-bio">
                        "{{Auth::user()->bio}}"
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary"> Edit
                        my profile <i class="fa fa-pen"> </i></button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="navbar-nav">
                        <li class="text-center">
                            <b class="badge badge-secondary pl-2 pr-2 pt-1 pb-1 ">
                                <b style="font-size:12px; color:white;"> {{ count($user->posts) }} Posts</b>
                            </b>
                        </li>
                        <li class="text-center mt-3">
                            <a style="color:#2A73B0;">
                                <i class="fab fa-facebook" style="font-size:180%;"></i> <i class="fab fa-twitter"
                                    style="font-size:180%;"></i> <i class="fab fa-pinterest"
                                    style="font-size:180%;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <!--- \\\\\\\Post-->

        {{-- MODAAAAAAAAAAAAAAAAAAAAAL --}}
        <div class="col-md-8">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> You sure about this? </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('userprofile.update' , $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="col mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="e-profile">
                                                        <div class="col col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div class="d-flex justify-content-center align-items-center rounded"
                                                                    style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                    <span
                                                                        style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><img
                                                                            class="profile-img-edit" id="img-avatar"
                                                                            src="/storage/avatars/{{Auth::user()->avatar}}" />
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <center>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col d-flex flex-column flex-sm-row justify-content-center">
                                                                            <div
                                                                                class="text-center text-sm-center mt-2">
                                                                                <div class="image-upload">
                                                                                    <label for="file-input">
                                                                                        <i style="font-size:135%;"
                                                                                            class=" fa fa-camera-retro text-secondary">
                                                                                        </i>
                                                                                        <strong>Update Avatar</strong>
                                                                                    </label>
                                                                                    <input id="file-input" type="file"
                                                                                        onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item"><a href="#"
                                                                    class="active nav-link">Details</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content pt-3">
                                                            <div class="tab-pane active">
                                                                <form class="form" novalidate="">
                                                                    <div class="row pt-sm-2 pb-1 mb-0 text-nowrap">
                                                                        <div class="col">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Full Name</label>
                                                                                        <input class="form-control"
                                                                                            type="text" name="name"
                                                                                            placeholder="John Smith"
                                                                                            value="{{Auth::user()->name}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Username</label>
                                                                                        <input class="form-control"
                                                                                            type="text" name="username"
                                                                                            placeholder="johnny.s"
                                                                                            value="{{Auth::user()->username}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="row pt-sm-2 pb-1 mb-0 text-nowrap">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Contact
                                                                                            No</label>
                                                                                        <input class="form-control"
                                                                                            type="text" name="phone"
                                                                                            value="{{Auth::user()->phone}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>Email</label>
                                                                                        <input class="form-control"
                                                                                            type="text" name="email"
                                                                                            value="{{Auth::user()->email}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                        <label>About</label>
                                                                                        <textarea name="bio"
                                                                                            class="form-control"
                                                                                            rows="3"
                                                                                            placeholder="My Bio">{{Auth::user()->bio}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END OF MODAAAAAAAAAAAAAAAAAAAAAL --}}

            {{-- Create Post Division --}}
            <div class="mt-2">
                <h2>Create Post</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}">
                    <div class="form-group">
                        @csrf
                        <input type="text" class="form-control" name="title" placeholder="Title" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" cols="30" rows="8"
                            placeholder="Type something here..."></textarea>
                    </div>
                    <div class="float-right mt-3">
                        <button style="font-size:13px;" type="submit" class="btn btn-primary">Post</button>
                    </div>
                    <small>
                        <p><strong>700x350 image dimension is recommended.</strong></p>
                    </small>

                    <div class="form-group">
                        <small><input type="file" id="myfile" name="cover_image"><br><br></small>
                    </div>
            </div>
            </form>

            {{-- End of Create Post Division --}}

        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card gedf-card mt-3">
            <div class="card-header">
                <div class="float-right">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                            <a class="dropdown-item" href="/posts/{{$post->id}}/edit" class="btn btn-secondary">
                                <i class="fa fa-pen" aria-hidden="true"></i> Edit</a>
                            <form action="{{ route('posts.destroy' , $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="text-muted h7 mt-2 mb-2"> <i class="far fa-clock"></i>
                    <strong>{{$post->created_at->format("F d, Y (l)")}}</strong>
                </div>
            </div>
            <div class="card-body">
                <img class="float-left mr-3" style="width:35%" src="/storage/cover_images/{{$post->cover_image}}">
                <a class="card-link" href="/posts/{{$post->id}}">
                    <h4 class="card-title"> {{$post->title}} </h4>
                </a>
                <p class="text-left">{{($post->description)}}</p>
            </div>
        </div>
        {{-- <div class="card-footer">PUT SOMETHING HERE</div> --}}
        @endforeach
        @else
        <h4>
            <p class="mb1">You have no posts.</p>
        </h4>
        @endif
        </h4>
        </h4>
    </div>
    <div class="row">
        <div class="col"></div>
        <center>
            <div class="col">{{$posts->links()}}</div>
        </center>
        <div class="col"></div>
    </div>
    @endsection
    @extends('layouts.footer')

    {{-- Comments 1--}}



    {{-- <div class="mr-2">
                                            <img class="rounded-circle" width="45"
                                                src="/storage/avatars/{{Auth::user()->avatar}}" />
</div>
<div class="ml-2">
    <div class="h5 m-0">{{Auth::user()->name}}</div>
    <div class="h7 text-muted">{{Auth::user()->email}}</div>
</div> --}}

{{-- Comments 1 --}}
{{-- Comments 2 --}}
<!-- Post /////-->



{{-- <div class="col-md-8">
        <div class="card">
            <div class="card-header"><a href="/posts/create" class="btn btn-primary">Create Post</a></div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
</div>
@endif
<div class="panel-body mb-3">
    <h3>Your Posts</h3>
    @if (count($posts) > 0)
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <th>{{$post->title}}</th>
            <th><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
            <th>
                <form action="{{ route('posts.destroy' , $post->id) }}" method="POST" class="float-right">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
    @else
    <p>You have no posts.</p>
    @endif
</div>
</div>
</div>
</div> --}}
{{-- Comments 2 --}}





{{-- <div id="demo" class="collapse">
                    <div class="form-group mt-3">
                        <label for="name"> Full Name: </label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" />
</div>

<div class="form-group">
    <label for="phone"> Contact No: </label>
    <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
</div>

<div class="form-group">
    <label for="email"> Email Address: </label>
    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
</div>
<div class="form-group">
    <button class="btn btn-outline-primary" type="submit">Update</button>
</div> --}}
{{-- ------------------------------------------------------------------------------------------------------ --}}
{{-- No of posts and date joined --}}
{{-- <div class="text-center text-sm-right">
    <h5><span class="badge badge-secondary pt-1 pb-1">No
            of
            Posts:
            {{ count($user->posts) }}</span>
</h5>
<div class="text-muted">
    <small>Joined
        {{Auth::user()->created_at->format("F d, Y")}}</small>
</div>
</div> --}}