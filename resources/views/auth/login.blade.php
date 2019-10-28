@extends('layouts.public_app')

@section('content')
<div class="card card-login mx-auto mt-5">
    <div class="card-header">{{ __('Login') }}</div>
    <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
        <div class="form-label-group">
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control {{$errors->has('email')? 'is-invalid':''}} placeholder="Email address" required="required" autofocus="autofocus">
            <label for="email">{{ __('E-Mail Address') }}</label>
            @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email')}}</strong>
                </span>
            @endif
        </div>
        </div>
        <div class="form-group">
        <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control  {{$errors->has('password')? 'is-invalid':''}}" class="form-control" placeholder="Password" required="required">
            <label for="password">Password</label>
            @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password')}}</strong>
                </span>
            @endif
        </div>
        </div>
        <div class="form-group">
        <div class="checkbox">
            <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
            Remember Password
            </label>
        </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" >Login</button>
    </form>
    <div class="text-center">
        <a class="d-block small mt-3" href="register">Register an Account</a>
        <a class="d-block small" href="password/reset">Forgot Password?</a>
    </div>
    </div>
</div>
@endSection