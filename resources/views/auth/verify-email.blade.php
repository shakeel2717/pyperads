@extends('landing.layout.app')
@section('title')
Verification
@endsection
@section('body')
    <div class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Verification</div>
            </div>
            <div class="row y-middle">
                <div class="col-12">
                    <div class="contact-wrap">
                        <div class="row">
                            <div class="col-12 col-md-8 mx-auto">
                                <h2>please check your email for confirmation</h2>
                                <form action="{{ route('verification.send') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                                    <br>
                                </form>
                                <br>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Sign Out</button>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
