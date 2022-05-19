@extends('admin.dashboard.layout.app')
@section('title')
    All Pending TIDs
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            All Pending TIDs
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
                                <th scope="col">TID</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
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
                                    <td>{{ $data->tid }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->amount }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.pendingTidsApprove', ['tid' => $data->id]) }}">Approve</a>
                                    </td>
                                </tr>
                            @empty
                                <h2>No Pending TIDs Found</h2>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection
