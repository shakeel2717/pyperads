@extends('landing.layout.app')
@section('title')
    Reset Password!
@endsection
@section('body')
    <div class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Reset Password!</div>
                <p>Please Choose a new password for your account.</p>
            </div>
            <div class="row y-middle">
                <div class="col-12">
                    <div class="contact-wrap">
                        <div class="row">
                            <div class="col-12 col-md-8 mx-auto">
                                <form method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="from-control" type="text" id="email" name="email"
                                                value="{{ old('email', $request->email) }}">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="password" id="password" name="password"
                                                placeholder="Password" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="password" id="password_confirmation" name="password_confirmation"
                                                placeholder="Password" required="">
                                        </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <input class="readon submit" type="submit" value="Reset Password!">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="text-center">
            <h1 class="display-4">Reset Password!</h1>
            <p>Please Choose a new password for your account.</p>
        </div>
        <x-input name="email" type="email" placeholder="Enter Email." value="{{ old('email', $request->email) }}" />
        <x-input name="password" type="password" placeholder="Choose new Password." value="{{ old('password') }}" />
        <x-input name="password_confirmation" type="password" placeholder="Confirm Password." value="{{ old('password') }}" />
        <button type="submit" class="btn btn-lg btn-block btn-primary">Reset Password</button>
    </form>
@endsection