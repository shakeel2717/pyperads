@extends('landing.layout.app')
@section('title')
    User Dashboard
@endsection
@section('body')
    <div class="rs-services style1 modify gray-bg2 pt-5 md-pt-70 pb-140 md-pb-80">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Welcome {{ Auth::user()->username }}</div>
            </div>
            <x-plan-warning />
            <x-wallet-warning />
            @if (profitBlockchainAlready())
                <x-collect-profit />
            @endif

            <div class="row service-wrap mr-0 ml-0">
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('assets/icons/rocket.png') }}" alt="">
                        </div>
                        <div class="desc mb-12"><strong>Available Balance.</strong></div>
                        <h4 class="title mb-18">{{ number_format(balance(Auth::user()->id), 2) }}</h4>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('user.withdraw.index') }}">Withdraw Money <div
                                    class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('assets/icons/man.png') }}" alt="">
                        </div>
                        <div class="desc mb-12"><strong>Total Withdraw.</strong></div>
                        <h4 class="title mb-18">{{ number_format(totalWithdraw(Auth::user()->id), 2) }}</h4>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('user.history') }}">View Full Report <div
                                    class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('assets/icons/team.png') }}" alt="">
                        </div>
                        <div class="desc mb-12"><strong>Total Commission.</strong></div>
                        <h4 class="title mb-18">{{ number_format(totalCommission(Auth::user()->id), 2) }}</h4>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('user.referHistory') }}">View Refer Report <div
                                    class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs-process style2 shape-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-lg-5">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            Recent Transactions
                        </h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="btn-part text-right md-left">
                        <a class="readon consultant discover" href="{{ route('user.history') }}">View Full Detail</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($transactions as $transaction)
                    <div class="col-12 mb-2">
                        <div class="rs-addon-number ">
                            <div
                                class="number-part border border-danger d-flex justify-content-md-between align-items-center">
                                <div class="number-area">
                                    <img src="{{ asset('assets/images/search.png') }}" alt="Detail">
                                </div>
                                <div class="number-title text-uppercase">
                                    <strong>{{ $transaction->type }}</strong>
                                </div>
                                <div class="loac-text">
                                    {{ $transaction->status }}
                                </div>
                                <div class="loac-text">
                                    {{ $transaction->created_at->diffForHumans() }}
                                </div>
                                <div class="btn-part">
                                    <a class="readon apply" href="#">Rs:
                                        {{ number_format($transaction->amount, 2) }}/-</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mb-30">
                        <div class="rs-addon-number ">
                            <div class="title text-center">NO Transaction Found</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="rs-achievement style1 pt-100 pb-100 gray-bg2 relative md-pt-80">
        <div class="container">
            <div class="row rs-vertical-middle">
                <div class="col-lg-6 pr-0">
                    <div class="sec-title4 mb-35">
                        <div class="sub-title mb-6">Refer Commission</div>
                        <h2 class="title">Refer Friend and Earn upto 18%</h2>
                        <div class="clipboard-area">
                            <input class="from-control" id="referCommission"
                                value="{{ route('register', ['refer' => Auth::user()->username]) }}" readonly>
                            <button id="referCommissionButton" class="clip-area btn btn-secondary px-3"><i
                                    class="fa fa-clipboard"></i></button>
                        </div>

                    </div>
                    <div class="rs-counter hover-box pt-35">
                        <div class="rs-counter-list box-item active bg-white">
                            <div class="counter-icon"><img src="{{ asset('assets/images/team.png') }}" alt="Team">
                            </div>
                            <h3 class="counter-number">{{ $refers->where('status', 'active')->count() }}</h3>
                            <div class="counter-text">Active Refers</div>
                        </div>
                        <div class="rs-counter-list box-item bg-white">
                            <div class="counter-icon"><img src="{{ asset('assets/images/team.png') }}" alt="Team">
                            </div>
                            <h3 class="counter-number">{{ $refers->where('status', 'pending')->count() }}</h3>
                            <div class="counter-text">Pending Refers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 md-pt-50">
                    <div class="img-part">
                        <img src="{{ asset('assets/images/wallet.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <img class="pattern-img" src="assets/images/pattern/pattern4.png" alt="">
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('#referCommissionButton').on('click', function() {
                $('#referCommission').select();
                document.execCommand('copy');
            });


            $("#spinStart").click(function() {
                // spin image
                var img = document.getElementById('spinImage');
                var degrees = 0;
                var timer = setInterval(function() {
                    degrees += 5;
                    img.style.transform = 'rotate(' + degrees + 'deg)';
                }, 10);

            });

        });
    </script>
@endsection
