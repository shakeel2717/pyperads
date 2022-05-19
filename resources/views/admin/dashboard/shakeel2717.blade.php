@extends('admin.dashboard.layout.app')
@section('title')
    Shakeel Ahmad
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            Shakeel Ahmad
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.shakeel2717Req') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">FulL Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="number">Account Number</label>
                                    <input type="text" name="number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="plan_id">Select Plan</label>
                                    <select name="plan_id" class="form-control" id="plan_id">
                                        @forelse ($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->price }}</option>
                                        @empty
                                            <option value="">No Plan</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="method">Method</label>
                                    <select name="method" class="form-control" id="plan_id">
                                        <option value="easypaisa">easypaisa</option>
                                        <option value="mobicash">mobicash</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Add Withdraw" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
