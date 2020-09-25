@extends('layouts.app')

@section('content')
<style>
    .mt1 {
        margin-top: 100px;
    }

    .img1 {
        max-width: 100%;
        display: block;
        height:
    }
</style>
<div class="container mt1">
    <a type="button" class="btn btn-secondary btn-sm" href="/posts">Back</a>
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8 mt-2">
            <div class="float-right">
                @if (!Auth::guest())
                @if (Auth::user()->id == $posts->user_id)
                <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                <form action="{{ route('posts.destroy' , $posts->id) }}" method="POST" class="float-right">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm ml-2"><i class="far fa-trash-alt"></i></button>
                </form>
                @endif
                @endif
            </div>
            <!-- Title -->
            <h1 class="mt-2">{{$posts->title}}</h1>


            <!-- Author -->
            <p class="lead">
                by
                <a href="/profile/{{ $posts->user->username }}">{{$posts->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$posts->created_at->format("F d, Y (l)")}}</p>

            <hr>

            <!-- Preview Image -->
            <img style="width:100%;" class="img1" src="/storage/cover_images/{{$posts->cover_image}}" alt="">


            <!-- Post Content -->
            <p align="justify" class="lead">{{$posts->description}}</p>

            <hr>
            {{-- END --}}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4 float-right">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature
                    the new Bootstrap 4 card containers!
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection

@extends('layouts.footer')