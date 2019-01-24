@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-xl-8 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-left d-none d-md-flex">
                    <div class="card-caption">
                        <div class="card-logo">
                            <img src="{{ asset('images/icons/Logo_BPN.png') }}">
                        </div>
                        <div class="banner-text">
                            <h2>Sistem Informasi Persuratan</h2>
                            <p>Badan Pertanahan Nasional Kabupaten Badung</p>
                        </div>  
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Login Admin</h5>
                    <form class="form-signin" method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                            @if ($errors->has('username'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                            <label for="username">Username</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required autofocus>
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <label for="password">Password</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection 
