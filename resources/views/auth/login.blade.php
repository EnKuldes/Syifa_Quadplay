@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 center">
        <div class="login-box">
            <a href="index.html" class="logo-name text-lg text-center">{{ config('app.name', 'Syifa') }}</a>
            <p class="text-center m-t-md">Please login into your account.</p>
            <form class="m-t-md" method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" required autofocus>
                    
                </div>
                <div class="form-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    
                </div>
                <button type="submit" class="btn btn-success btn-block">{{ __('Login') }}</button>
            </form>
        </div>
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div><!-- Row -->
@endsection