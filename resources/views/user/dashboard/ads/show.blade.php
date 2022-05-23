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

            <div class="row mr-0 ml-0 h-100">
                <h3 class="text-center mt-3">Please Wait: <span id="timer">9</span> </h3>
                {!! $ad->link !!}
                {{-- <iframe src="{{ $ad->link }}" frameborder="0" height="740"></iframe> --}}
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        var time = 9;
        var interval = setInterval(function() {
            time--;
            document.getElementById("timer").innerHTML = time;
            if (time <= 0) {
                clearInterval(interval);
                window.location.href = "{{ route('user.ads.edit', ['ad' => $ad->id]) }}";
            }
        }, 1000);
    </script>
@endsection
