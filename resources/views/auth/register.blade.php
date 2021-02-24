@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clerk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/student.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid login-section">
    <div class="row justify-content-center login-height case-register">
        <div class="col-md-8 col-xs-12">
            <div class="card h-100">
                <div class="card-header">User Registration</div>
                <div class="card-body pr-md-5 pl-md-5 pt-md-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-7 col-xs-12 mt-1">
                                <label for="username" class="col-md-12 pl-0">{{ __('Username :') }}</label>
                                <input id="username" type="text" placeholder="e.g. A111111" class="text-upper form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5 col-xs-12 mt-1 mt-3 mt-md-1">
                                <label for="role" class="col-md-12 pl-0">{{ __('Role :') }}</label>

                                <select name="role" id="role" class="form-control" placeholder="" required>
                                    <option value="" disabled selected>Please choose a role.</option>
                                    <option value="admin">Admin</option>
                                    <option value="clerk">Clerk</option>
                                    <option value="dentist">Dentist</option>
                                    <option value="student">Student</option>
                                    <option value="technician">Technician</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2 mt-md-4">
                            <div class="col-md-12">
                                <label for="name" class="col-md-12 pl-0">{{ __('Full Name :') }}</label>
                                <input id="name" type="text" placeholder="e.g. ABU BAKAR BIN AHMAD" class="text-upper form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2 mt-md-4">
                            <div class="col-md-6 col-xs-12">
                                <label for="email" class="col-md-12 pl-0">{{ __('E-mail Address :') }}</label>
                                <input id="email" type="text" placeholder="e.g. ukmdental@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-xs-12 mt-3 mt-md-0">
                                <label for="phone" class="col-md-12 pl-0">{{ __('Phone No. :') }}</label>
                                <input id="phone" type="text" placeholder="e.g. 011-1111111" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2 mt-md-4">
                            <div class="col-md-6 col-xs-12 mt-3 mt-md-0">
                                <label for="password" class="col-md-12 pl-0">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-xs-12  mt-3 mt-md-0">
                                <label for="password-confirm" class="col-md-12 pl-0">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-4 mb-0 text-center">
                            <div class="col-md-12 col-xs-12">
                                <div class="row justify-content-xs-center justify-content-md-end pr-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
