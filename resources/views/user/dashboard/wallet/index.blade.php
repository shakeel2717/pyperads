@extends('landing.layout.app')
@section('title')
    User Dashboard
@endsection
@section('body')
    <div class="rs-services style1 modify gray-bg2 pt-5 md-pt-70 pb-140 md-pb-80">
        <div class="container">
            <div class="col-lg-12 pl-40 md-pr-15 md-mb-50">
                <div class="sec-title">
                    <h2 class="title pb-30">
                        Update Wallet Detail
                    </h2>
                    <p class="margin-0">Update Wallet Record, whenever you place a Withdraw request, Admin will send
                        payment to this wallet.</p>
                    <hr>
                    <form id="walletForm" action="{{ route('user.wallet.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 mb-30">
                                <div class="form-group">
                                    <label for="tid"><strong>Wallet Type</strong></label>
                                    <select name="type" id="type" class="from-control">
                                        <option value="">Select Withdraw Type</option>
                                        <option value="bank">Bank</option>
                                        <option value="easypaisa">Easy Paisa</option>
                                        <option value="mobicash">MobiCash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30" id="bankOnly">
                                <div class="form-group">
                                    <label for="tid"><strong>Wallet Name</strong></label>
                                    <input class="from-control" type="text" id="name" name="name"
                                        placeholder="eg: Micro Finance Bank" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30">
                                <div class="form-group">
                                    <label for="tid"><strong>Account Title</strong></label>
                                    <input class="from-control" type="text" id="title" name="title"
                                        placeholder="Account Title" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30">
                                <div class="form-group">
                                    <label for="tid"><strong>Account Number</strong></label>
                                    <input class="from-control" type="text" id="number" name="number"
                                        placeholder="Account Number" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-30">
                                <div class="form-group" id="recievingNumber">
                                    <label for="tid"><strong>Recieving Number (Optional)</strong></label>
                                    <input class="from-control" type="text" id="r_number" name="r_number"
                                        placeholder="Recieving Number (Optional)" required="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="btn-part">
                        <a type="submit" class="readon consultant discover"
                            onclick="document.getElementById('walletForm').submit();">Update Wallet Detail</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $("#recievingNumber").hide();
            $("#bankOnly").hide();
            $('#type').on('change', function() {
                if (this.value == 'bank') {
                    $('#bankOnly').show();
                    $('#recievingNumber').show();
                } else {
                    $('#bankOnly').hide();
                    $('#recievingNumber').hide();
                }
            });
        });
    </script>
@endsection
