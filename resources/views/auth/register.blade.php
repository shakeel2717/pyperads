@extends('landing.layout.app')
@section('title')
    Home
@endsection
@section('body')
    <div class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Sign In</div>
                <h4 class="title mb-0">Already have an Account?<span><a href="{{ route('login') }}">Sign in</a></span>
                    </h2>
            </div>
            <div class="row y-middle">
                <div class="col-12">
                    <div class="contact-wrap">
                        <div class="row">
                            <div class="col-12 col-md-8 mx-auto">
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="from-control" type="text" id="name" name="name"
                                                placeholder="FulL Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="text" id="username" name="username"
                                                placeholder="Username" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="email" id="email" name="email"
                                                placeholder="E-Mail" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="password" id="password" name="password"
                                                placeholder="Password" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="password" id="password_confirmation" name="password_confirmation"
                                                placeholder="Password Confrim" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="from-control" type="refer" id="refer" name="refer"
                                                placeholder="Refer" value="{{ $refer }}">
                                        </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <input class="readon submit" type="submit" value="Create Account">
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
    </div>
@endsection
