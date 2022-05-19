@extends('admin.dashboard.layout.app')
@section('title')
    Edit Methods
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            Edit Methods
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.userPlanStore') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="method">Plan Id</label>
                                    <select class="form-control" name="plan_id" id="plan_id">
                                        @forelse ($plans as $plan)
                                            <option value="{{ $plan->id }}">{{ $plan->name }} | {{ $plan->price }}
                                            </option>
                                        @empty
                                            <option value="">No Plan Found</option>
                                        @endforelse
                                    </select>
                                    <input type="hidden" name="userPlan_id" value="{{ $userPlan->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update Method" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
