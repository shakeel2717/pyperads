@extends('landing.layout.app')
@section('title')
    User Withdraw Request
@endsection
@section('body')
    <div class="rs-services style1 modify gray-bg2 pt-5 md-pt-70 pb-140 md-pb-80">
        <div class="container">
            <div class="col-lg-12 pl-40 md-pr-15 md-mb-50">
                <div class="sec-title">
                    <h2 class="title pb-30">
                        User Withdraw Request
                    </h2>
                    <p class="margin-0">Request your money for withdrawal to your local Bank Account..</p>
                    <hr>
                    <form id="withdrawForm" action="{{ route('user.withdraw.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-30">
                                <div class="form-group">
                                    <label for="tid"><strong>Select Wallet</strong> | <a href="{{ route('user.wallet.index') }}">Change Wallet</a></label>
                                    <select name="wallet" id="wallet" class="from-control">
                                        <option value="">Select Wallet Type</option>
                                        @forelse ($wallets as $wallet)
                                            <option value="{{ $wallet->id }}">{{ $wallet->name }} | {{ $wallet->number }} | {{ $wallet->type }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-30">
                                <div class="form-group">
                                    <label for="tid"><strong>Amount</strong> Available Balance Rs:
                                        {{ number_format(balance(Auth::user()->id), 2) }}/-</label>
                                    <input class="from-control" type="text" id="amount" name="amount"
                                        placeholder="Amount" required="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="btn-part">
                        <a type="submit" class="readon consultant discover"
                            onclick="document.getElementById('withdrawForm').submit();">Withdraw now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
