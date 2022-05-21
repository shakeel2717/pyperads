@extends('admin.dashboard.layout.app')
@section('title')
    All Ads
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            All Ads
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
                                <th scope="col">Title</th>
                                <th scope="col">Link</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ads as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->link }}</td>
                                    <td><a href="{{ route('admin.ads.edit', ['ad' => $data->id]) }}">Edit</a></td>
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
