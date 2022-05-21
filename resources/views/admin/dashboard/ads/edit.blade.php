@extends('admin.dashboard.layout.app')
@section('title')
    Edit Ad
@endsection
@section('body')
    <div class="rs-process style2 gray-bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row y-middle mb-50">
                <div class="col-12">
                    <div class="sec-title md-mb-30">
                        <h2 class="title">
                            Edit Ad
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.ads.update', ['ad' => $ad->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="title">Ad Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $ad->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="link">Ad Link / Ad Code</label>
                                    <textarea name="link" id="link" cols="30" rows="10">
                                        {{ $ad->link }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update Ad" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
