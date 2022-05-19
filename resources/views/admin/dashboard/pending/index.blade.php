@extends('admin.dashboard.layout.app')
@section('title')
    Pending Withdrawals
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            Pending Withdrawals
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
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">TID</th>
                                <th scope="col">Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Account #</th>
                                <th scope="col">R_Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->amount }}</td>
                                    <td>{{ $data->user->tid->tid ?? "No Tid" }}</td>
                                    <td>{{ $data->withdrawtype }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->number }}</td>
                                    <td>{{ $data->r_number }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.withdrawApproveReq', $data->id) }}"
                                            class="btn btn-success text-white">Approve</a>
                                        <a href="{{ route('admin.withdrawRejectReq', $data->id) }}"
                                            class="btn btn-danger text-white">Reject</a>
                                    </td>
                                </tr>
                            @empty
                                <h2>No User Found</h2>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
