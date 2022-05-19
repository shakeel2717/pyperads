@extends('landing.layout.app')
@section('title')
    Forgot Password!
@endsection
@section('body')
    <div class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Forgot Password!</div>
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password
                    reset link that will allow you to choose a new one.</p>
            </div>
            <div class="row y-middle">
                <div class="col-12">
                    <div class="contact-wrap">
                        <div class="row">
                            <div class="col-12 col-md-8 mx-auto">
                                <form method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="from-control" type="text" id="email" name="email"
                                                placeholder="E-Mail" required="">
                                        </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <input class="readon submit" type="submit" value="Forgot Password!">
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
