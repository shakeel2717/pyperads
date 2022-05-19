@extends('admin.dashboard.layout.app')
@section('title')
    All Methods
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            All Methods
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
                                <th scope="col">Method</th>
                                <th scope="col">Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Rec Number</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->method }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->number }}</td>
                                    <td>{{ $data->r_number }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td><a href="{{ route('admin.method.edit',['method' => $data->id]) }}">Edit</a></td>
                                    <td>{{ $data->created_at }}</td>
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
