@extends('admin.dashboard.layout.app')
@section('title')
    All User Plans
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            All User Plans
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">

                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Expire Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Complete</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->plan_id }}</td>
                                    <td>{{ $data->exp_date }}</td>
                                    <td>{{ $data->amount }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->complete }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.PlanEdit',['id' => $data->id]) }}" class="btn btn-primary text-white">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <h2>No User Plan Found</h2>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
