@extends('admin.dashboard.layout.app')
@section('title')
    All Users
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            All Users
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
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Commission</th>
                                <th scope="col">Withdraws</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Join Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td><a href="{{ route('admin.userPassword',['user' => $data->id]) }}" class="btn btn-primary text-white">Set Pass</a></td>
                                    <td>{{ number_format(balance($data->id), 2) }}/-</td>
                                    <td>{{ number_format(totalCommission($data->id), 2) }}/-</td>
                                    <td>{{ number_format(totalApproveWithdraw($data->id), 2) }}/-</td>
                                    <td>{{ $data->email }}</td>
                                    <td class="text-uppercase">{{ $data->status }}</td>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($data->status == 'active' || $data->status == 'pending')
                                            <a href="{{ route('admin.userSuspend', ['user' => $data->id]) }}">Suspend</a>
                                        @elseif($data->status == 'suspended')
                                            <a
                                                hrSef="{{ route('admin.userActivate', ['user' => $data->id]) }}">Activate</a>
                                        @endif
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
