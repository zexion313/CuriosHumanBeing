@extends('layouts.headlayout')

@section('content')
<style>
    .mt1 {
        margin-top: 80px;
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
        margin-top: 20px;

    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 18px;
        font-weight: 600;
    }

    .profile-usertitle-job {
        color: #5b9bd1;
        font-size: 14px;
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
    <div class="row profile">
        <div class="col-md-4">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="/storage/avatars/{{ $user->avatar }}" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{$user->name}}
                    </div>
                    <div class="profile-usertitle-job">
                        {{$user->email}}
                    </div>
                    <div class="profile-usertitle-bio">
                        "{{$user->bio}}"
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="navbar-nav">
                        <li class="text-center">
                            <b class="badge badge-secondary pl-2 pr-2 pt-1 pb-1 ">
                                <b style="font-size:14px; color:white;"> {{ count($user->posts) }} Posts</b>
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
        <div class="col-md-8">
            <div class="profile-content">
                <div class="container">
                    @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <div class="card gedf-card">
                        <div class="card-header">
                            <div class="float-right">
                                <div class="dropdown">
                                    @if (!Auth::guest())
                                    @if (Auth::user()->id == $post->user_id)
                                    <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                                        <a class="dropdown-item" href="/posts/{{$post->id}}/edit"
                                            class="btn btn-primary">
                                            Edit</a>
                                        <form action="{{ route('posts.destroy' , $post->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item" type="submit" class="btn btn-danger">
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <div class="text-muted h7 mt-2 mb-2"> <i class="far fa-clock"></i>
                                <b>{{$post->created_at->format("F d, Y (l)")}}</b>
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="float-left mr-3" style="width:50%;"
                                src="/storage/cover_images/{{$post->cover_image}}" alt="">
                            <a class="card-link" href="/posts/{{$post->id}}">
                                <h4 class="card-title"> {{$post->title}} </h4>
                            </a>
                            <p align="justify">{{($post->description)}}</p>
                        </div>
                    </div> <br>
                    @endforeach
                    @else
                    <h4>
                        <p>You have no posts.</p>
                    </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col">

        </div>

        <div>
            {{$posts->links()}}
        </div>

        <div class="col">

        </div>
    </div>
</div>
@endsection
@extends('layouts.footer')