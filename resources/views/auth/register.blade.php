@extends('layouts.public_app')

@section('content')
<div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
      <form method="POST" action="{{ route('register') }}">
      @csrf
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstname" name="firstname" class="form-control  {{$errors->has('firstname')? 'is-invalid':''}}" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstname">First name</label>
                @if($errors->has('firstname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('firstname')}}</strong>
                    </span>
                @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastname" name="lastname" class="form-control {{$errors->has('lastname')? 'is-invalid':''}}" placeholder="Last name" required="required">
                  <label for="lastname">Last name</label>
                    @if($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname')}}</strong>
                        </span>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control {{$errors->has('email')? 'is-invalid':''}}" placeholder="Email address" required="required">
              <label for="email">Email address</label>
                    @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email')}}</strong>
                        </span>
                    @endif
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" placeholder="Password" required="required">
                  <label for="password">Password</label>
                    @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password')}}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password_confirmation" class="form-control {{$errors->has('password_confirmation')? 'is-invalid':''}}" placeholder="Confirm password" required="required">
                  <label for="password_confirmation">Confirm password</label>
                    @if($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation')}}</strong>
                        </span>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" >Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login">Login Page</a>
          <a class="d-block small" href="password/reset">Forgot Password?</a>
        </div>
      </div>
    </div>
@endSection