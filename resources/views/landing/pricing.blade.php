@extends('landing.layout.app')
@section('title')
    Home
@endsection
@section('body')
    <div class="rs-pricing style2 gray-bg2 pb-187 pt-128 md-pt-70">
        <div class="container">
            <div class="sec-title4 text-center mb-60">
                <div class="sub-title mb-6">Pricing</div>
                <h2 class="title">Pricing Plan</h2>
            </div>
            <div class="row">
                @forelse ($plans as $plan)
                    <div class="col-md-4">
                        <div class="pricing-wrap bg-white mb-4 active text-center">
                            <div class="head-part">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/crown.png') }}" alt="Office">
                                </div>
                                <div class="title">{{ $plan->name }}</div>
                                <div class="price">${{ number_format($plan->price, 0) }}<span
                                        class="period">/{{ $plan->duration }}D</span></div>
                            </div>
                            <div class="body-part">
                                <ul>
                                    <li>Profit: <strong>{{ number_format($plan->profit, 2) }} PKR</strong> <i
                                            class="fa fa-check"></i></li>
                                    <li>Plan Duration: <strong>{{ $plan->duration }} Days</strong> <i
                                            class="fa fa-check"></i></li>
                                    <li>Direct Commission: <strong>{{ $plan->direct }} PKR</strong> <i
                                            class="fa fa-check"></i></li>
                                    <li>In-Direct Comm.: <strong>{{ $plan->indirect }} PKR</strong> <i
                                            class="fa fa-check"></i></li>
                                    <li>Withdraw Limit: <strong>{{ number_format($plan->withdraw, 2) }} PKR</strong> <i
                                            class="fa fa-check"></i></li>
                                </ul>
                                <div class="btn-part">
                                    <a class="price-btn"
                                        href="{{ route('user.plan.show', ['plan' => $plan->id]) }}">Activate now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
