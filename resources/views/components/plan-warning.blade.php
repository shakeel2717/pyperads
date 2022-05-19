@if (Auth::user()->tid == '')
    <div class="row service-wrap mb-2 mr-0 ml-0 border border-danger">
        <div class="col-12">
            <div class="service-grid p-2 d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="{{ asset('assets/images/cross.png') }}" alt="Cross" width="50">
                    </div>
                    <div class="desc ml-md-5">No Active Plan Found, Please Choose a Plan to start earning.</div>
                </div>
                <div class="btn-wrap">
                    <a class="readmore text-success" href="{{ route('landing.pricing') }}">Choose Plan <div
                            class="btn-arrow text-success"></div></a>
                </div>
            </div>
        </div>
    </div>
@endif
@if (Auth::user()->tid != '')
    @if (Auth::user()->tid->status == 0)
        <div class="row service-wrap mb-5 mr-0 ml-0 border border-warning">
            <div class="col-12">
                <div class="service-grid p-2 d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="mr-md-5">
                            <img src="{{ asset('assets/images/i.png') }}" alt="Cross" width="50">
                        </div>
                        <div class="desc">Your Plan Activation Request is under review, Please wait.</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
