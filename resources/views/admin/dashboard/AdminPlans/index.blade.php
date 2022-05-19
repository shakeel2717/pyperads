@extends('admin.dashboard.layout.app')
@section('title')
    All Plans
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            All @extends('landing.layout.app')
                        @section('title')
                            All Plans
                        @endsection
                        @section('body')
                            <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
                                <div class="container custom">
                                    <div class="row y-middle mb-50">
                                        <div class="col-12">
                                            <div class="sec-title md-mb-30">
                                                <h2 class="title">
                                                    All Plans
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table  id="myTable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Profit</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Duration</th>
                                                        <th scope="col">Withdraw</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($datas as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->price }}</td>
                                                            <td>{{ $data->profit }}</td>
                                                            <td>{{ $data->total }}</td>
                                                            <td>{{ $data->duration }}</td>
                                                            <td>{{ $data->withdraw }}</td>
                                                            <td>{{ $data->status }}</td>
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

                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
