@extends('layouts.app')

@section('content')
<style>
    /* IMG displaying */
    .person-card {
        margin-top: 5em;
        padding-top: 5em;
    }

    .person-card .card-title {
        text-align: center;
    }

    .person-card .person-img {
        width: 8em;
        position: absolute;
        top: -5em;
        left: 50%;
        margin-left: -5em;
        border-radius: 100%;
        overflow: hidden;
        background-color: white;
    }
</style>
<div class="container" style="margin-top: 160px; margin-bottom:30px;">
    <!-- Sign up form -->
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <!-- Sign up card -->
        <div class="card person-card mb-2">
            <div class="card-body">
                <!-- image -->
                <img id="img-avatar" class="person-img" src="/storage/avatars/default.jpg">
                </img>

                {{-- Profile Picture --}}
                <center>
                    <div class="form-group row">
                        <div class="col-12 ml-4 mb-2">
                            <small><input id="myfile" type="file" name="avatar" required=""
                                    onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])">
                            </small>
                        </div>
                    </div>
                </center>
                {{-- Profile Picture --}}

                <h2 id="who_message" class="card-title">Who are you ?</h2>
                <!-- First row (on medium screen) -->
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                        <input name="name" type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">How to contact you ?</h2>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Phone number</label>
                            <input type="text" class="form-control" name="phone" placeholder="+63 912 345 6789"
                                required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Make your account secure !</h2>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Pasword</label>
                            <input type="password" class="form-control" name="password" placeholder="Type your password"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="password_conf" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Type your password again" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 1em;">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Register !</button>
        </div>
    </form>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name:') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username:') }}</label>

            <div class="col-md-6">
                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror"
                    name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No.:') }}</label>

            <div class="col-md-6">
                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password:') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        {{-- Profile Picture --}}

        {{-- <div class="form-group row">
                            <label for="avatar"
                                class="col-md-4 col-form-label text-md-right">{{ __('Avatar:') }}</label>

        <div class="col-md-6">
            <input id="myfile" type="file" name="avatar" required>
        </div>
</div>

{{-- Profile Picture --}}

{{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div><br><br><br><br> --}}
@endsection
@extends('layouts.footer')