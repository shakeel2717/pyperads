@if (Auth::user()->wallet == '' || Auth::user()->wallet->number == null)
    <div class="row service-wrap mb-2 mr-0 ml-0 border border-danger">
        <div class="col-12">
            <div class="service-grid p-2 d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="{{ asset('assets/images/cross.png') }}" alt="Cross" width="50">
                    </div>
                    <div class="desc ml-md-5">Please update your Wallet profile to get paid Instantly.</div>
                </div>
                <div class="btn-wrap">
                    <a class="readmore text-success" href="{{ route('user.wallet.index') }}">Update Now <div
                            class="btn-arrow text-success"></div></a>
                </div>
            </div>
        </div>
    </div>
@endif
