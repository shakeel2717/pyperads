@extends('landing.layout.app')
@section('title')
    User Withdraw Request
@endsection
@section('body')
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
                        <a class="readon consultant discover" href="{{ route('user.dashboard') }}">Go Back to Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($transactions as $transaction)
                    <div class="col-12 mb-30">
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
                                @if ($transaction->title != '')
                                    <div class="loac-text">
                                        Title
                                        <br>
                                        {{ $transaction->title }}
                                    </div>
                                @endif
                                @if ($transaction->number != '')
                                    <div class="loac-text">
                                        Account #
                                        <br>
                                        {{ $transaction->number }}
                                    </div>
                                @endif
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
@endsection
