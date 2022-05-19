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
                            <form action="{{ route('admin.method.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="method">Method</label>
                                    <input type="text" name="method" class="form-control" value="{{ $method->method }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Method Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $method->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="number">Method Number</label>
                                    <input type="text" name="number" class="form-control" value="{{ $method->number }}">
                                </div>

                                <div class="form-group">
                                    <label for="r_number">Method Rec Number</label>
                                    <input type="text" name="r_number" class="form-control" value="{{ $method->r_number }}">
                                </div>

                                <div class="form-group">
                                    <label for="title">Method Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $method->title }}">
                                    <input type="hidden" name="method_id" value="{{ $method->id }}">
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
