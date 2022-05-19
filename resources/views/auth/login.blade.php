@extends('landing.layout.app')
@section('title')
Sign In
@endsection
@section('body')
    <div class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Sign In</div>
                <h2 class="title mb-0">Don't have an Account?<span><a href="{{ route('register') }}">Create new Account</a></span></h2>
            </div>
            <div class="row y-middle">
                <div class="col-12">
                    <div class="contact-wrap">
                        <div class="row">
                            <div class="col-12 col-md-8 mx-auto">
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="from-control" type="text" id="email" name="email"
                                                placeholder="E-Mail" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="password" id="password" name="password"
                                                placeholder="Password" required="">
                                        </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <input class="readon submit" type="submit" value="Sign In">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ route('password.request') }}">Forgot Password!</a>
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
