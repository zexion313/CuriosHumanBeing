@extends('layouts.headlayout')
@section('content')

<style>
    .mt1 {
        margin-top: 100px;
    }
</style>
<div class="container mt1">
    <h2><i class="fas fa-bullhorn"></i> Announcements / Events</h2>
    @if (count($posts) > 0)


    {{-- Start --}}
    <section class="details-card mb-4">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card-content mb-4">
                    <div class="card-img">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        <span>
                            {{-- This should be tag but for now I put the time --}}
                            <h4>{{$post->created_at->diffForHumans()}}</h4>
                        </span>
                    </div>
                    <div class="card-desc">
                        <img class="rounded-circle" width="40" src="/storage/avatars/{{$post->user->avatar}}" />
                        <strong><a href="/profile/{{ $post->user->username }}">
                                {{$post->user->name}}
                            </a></strong>
                        <h3>{{$post->title}}</h3>
                        {{-- Excerpt! --}}
                        <p>{{Str::words($post->description,20)}}</p>
                        {{-- Excerpt! --}}
                        <h3><a class="btn-card btn-outline-primary" href="/posts/{{$post->id}}"> Read </a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
</section>

{{-- End --}}



@else

<p>No Available Post</p>

@endif
<div class="container">
    <div class="row">
        <div class="col"></div>
        <center>
            <div class="col">{{$posts->links()}}</div>
        </center>
        <div class="col"></div>
    </div>
</div>
@endsection

@extends('layouts.footer')

{{-- COMMENTED --}}
{{-- <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
</div>
<div class="col-md-8 col-sm-8">
    <img style=" border-radius:50%; border-color:blue; width:8%" src="/storage/avatars/{{$post->user->avatar}}" alt="">
    {{$post->user->name}}<h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
    <small>Written on {{$post->created_at}} </small>
</div> --}}