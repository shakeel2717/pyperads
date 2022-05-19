@extends('landing.layout.app')
@section('title')
    Activate Plan {{ $plan->name }}
@endsection
@section('body')
    <div id="rs-faq" class="rs-faq gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-6 md-pl-15">
                    @forelse ($methods as $method)
                        <div class="row">
                            <div class="col-12">
                                <div class="faq-content">
                                    <div id="accordion" class="accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="card-link collapsed text-uppercase" href="#"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $loop->iteration }}"
                                                    aria-expanded="false">{{ $method->method }}</a>
                                            </div>
                                            <div id="collapse{{ $loop->iteration }}" class="collapse"
                                                data-bs-parent="#accordion" style="">
                                                <div class="card-body">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Bank Name</th>
                                                                <td>{{ $method->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Account Title</th>
                                                                <td>{{ $method->title }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Account Number</th>
                                                                <td>{{ $method->number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Recieving #</th>
                                                                <td>{{ $method->r_number }}</td>

                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="faq-content">
                            <div id="accordion" class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" href="#">No Method Available!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="col-lg-6 pl-40 md-pr-15 md-mb-50">
                    <div class="sec-title">
                        <h2 class="title pb-30">
                            Transaction ID
                        </h2>
                        <p class="margin-0">
                            Please send me <strong>${{ number_format($plan->price, 2) }}/-</strong> to our official
                            binance accounts after payment successfully sent please don't
                            forget to provide the TID below the instant active your plan
                        </p>
                        <hr>
                        <form id="tidForm" action="{{ route('user.plan.update', ['plan' => $plan->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="col-lg-12 mb-30">
                                <div class="form-group">
                                    <label for="tid"><strong>Transaction ID</strong></label>
                                    <input class="from-control" type="text" id="tid" name="tid"
                                        placeholder="Type your Transaction ID here" required="">
                                </div>
                            </div>
                        </form>
                        <div class="btn-part">
                            <a type="submit" class="readon consultant discover"
                                onclick="document.getElementById('tidForm').submit();">Activate Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
