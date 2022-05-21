@extends('landing.layout.app')
@section('title')
    Advertisements
@endsection
@section('body')
    <div class="rs-services style1 modify gray-bg2 pt-5 md-pt-70 pb-140 md-pb-80">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Welcome {{ Auth::user()->username }}</div>
            </div>

            <div class="row service-wrap mr-0 ml-0">
                @foreach ($ads as $ad)
                    <div class="col-lg-4 padding-0">
                        <div class="service-grid">
                            <div class="mb-23">
                                <img src="{{ asset('assets/icons/ads.png') }}" alt="" width="100">
                            </div>
                            <div class="desc mb-12 text-uppercase text-success"><strong>Availbe to Watch.</strong></div>
                            <h4 class="title mb-18">{{ $ad->title}}</h4>
                            <div class="btn-wrap">
                                <a class="readmore" href="{{ route('user.ads.show',['ad' => $ad->id]) }}">Watch now <div
                                        class="btn-arrow"></div></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
