@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid login-section">
    <div class="row justify-content-center login-height">
        <div class="col-md-8 col-xs-12">
            <div class="card login-height">
                <div class="row login-header">
                    <div class="col-md-12 col-xs-12">
                        <p class="login-title">EzDental</p>
                        <p class="login-subtitle">Manage your dental records just at the end of your fingertips</p>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mt-1">

                            <div class="col-md-6 offset-md-3 col-xs-6 offset-xs-3">
                                <input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3 col-xs-6 offset-xs-3">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-md-6 offset-md-3 col-xs-6 offset-xs-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 mb-0 text-center">
                            <div class="col-md-12 col-xs-12">
                                <div class="row justify-content-center">

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-outline-success mr-2" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-success ml-3">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
