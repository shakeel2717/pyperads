@extends('admin.dashboard.layout.app')
@section('title')
    Admin Dashboard
@endsection
@section('body')
    <div class="rs-services style1 modify gray-bg2 pt-5 md-pt-70 pb-140 md-pb-80">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Welcome {{ session('admin')->username }}</div>
            </div>
            <div class="row service-wrap mb-3 mr-0 ml-0">
                <div class="col-12">
                    <a href="{{ route('admin.allTids') }}" class="readon2 m-1">All Tids</a>
                    <a href="{{ route('admin.pendingTids') }}" class="readon2 m-1">Pending Tids</a>
                    <a href="{{ route('admin.allPlans') }}" class="readon2 m-1">All User Plans</a>
                    <a href="{{ route('admin.deposite') }}" class="readon2 m-1">Deposite</a>
                    <a href="{{ route('admin.withdraw') }}" class="readon2 m-1">All Withdraw</a>
                    <a href="{{ route('admin.pending') }}" class="readon2 m-1">Pending Withdraw</a>
                </div>
            </div>
            <div class="row service-wrap mb-3 mr-0 ml-0">
                <div class="col-lg-3 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>All Users.</strong></div>
                        <h4 class="title mb-18">{{ $users->where('role', 'user')->count() }}</h4>
                    </div>
                </div>
                <div class="col-lg-3 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Pending Users.</strong></div>
                        <h4 class="title mb-18">
                            {{ $users->where('role', 'user')->where('status', 'pending')->count() }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Approved Users.</strong></div>
                        <h4 class="title mb-18">
                            {{ $users->where('role', 'user')->where('status', 'approved')->count() }}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Suspended Users.</strong></div>
                        <h4 class="title mb-18">
                            {{ $users->where('role', 'user')->where('status', 'suspend')->count() }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row service-wrap mb-3 mr-0 ml-0">
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Total Investment.</strong></div>
                        <h4 class="title mb-18">{{ number_format($userPlan->sum('amount'), 2) }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Today Investment.</strong></div>
                        <h4 class="title mb-18">{{ number_format($todayUserPlan->sum('amount'), 2) }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Pending Investment.</strong></div>
                        <h4 class="title mb-18">
                            <h4 class="title mb-18">{{ number_format($tid->where('status',0)->sum('amount'), 2) }}</h4>
                        </h4>
                    </div>
                </div>
                {{-- <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Complete Investment.</strong></div>
                        <h4 class="title mb-18">
                            <h4 class="title mb-18">
                                {{ number_format($userPlan->where('complete', 1)->sum('amount'), 2) }}</h4>
                        </h4>
                    </div>
                </div> --}}
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Total Withdraw.</strong></div>
                        <h4 class="title mb-18">
                            <h4 class="title mb-18">
                                {{ number_format($withdraw->sum('amount'), 2) }}</h4>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Pending Withdraw.</strong></div>
                        <h4 class="title mb-18">
                            <h4 class="title mb-18">
                                {{ number_format($withdraw->where('status','pending')->sum('amount'), 2) }}</h4>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Approved Withdraw.</strong></div>
                        <h4 class="title mb-18">
                            <h4 class="title mb-18">
                                {{ number_format($withdraw->where('status','approved')->sum('amount'), 2) }}</h4>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid p-4">
                        <div class="desc mb-12"><strong>Today Withdraw.</strong></div>
                        <h4 class="title mb-18">
                            <h4 class="title mb-18">
                                {{ number_format($todayWithdraw->where('status','approved')->sum('amount'), 2) }}</h4>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.allUsers') }}" class="readon2 m-1">All Users</a>
                    <a href="{{ route('admin.allTids') }}" class="readon2 m-1">All Tids</a>
                    <a href="{{ route('admin.pendingTids') }}" class="readon2 m-1">Pending Tids</a>
                    <a href="{{ route('admin.allPlans') }}" class="readon2 m-1">All User Plans</a>
                    <a href="{{ route('admin.allTransaction') }}" class="readon2 m-1">All Transactions</a>
                    <a href="{{ route('admin.adminplans') }}" class="readon2 m-1">System Plans</a>
                    <a href="{{ route('admin.methods') }}" class="readon2 m-1">Method</a>
                    <a href="{{ route('admin.deposite') }}" class="readon2 m-1">Deposite</a>
                    <a href="{{ route('admin.withdraw') }}" class="readon2 m-1">All Withdraw</a>
                    <a href="{{ route('admin.pending') }}" class="readon2 m-1">Pending Withdraw</a>
                    <a href="{{ route('admin.commission') }}" class="readon2 m-1">Commission</a>
                    <a href="{{ route('admin.profit') }}" class="readon2 m-1">Profit</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add balance</h5>
                            <form action="{{ route('admin.addBalance') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add Balance" class="btn btn-block btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Activate User Plan</h5>
                            <form action="{{ route('admin.activtePlanReq') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="amount">Select Plan</label>
                                    <select name="plan_id" class="form-control" id="plan_id">
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->name }} | {{ $plan->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Activate Plan" class="btn btn-block btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
