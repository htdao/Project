@extends('backend.layouts.master')
@section('title')
Images
@endsection
@section('css')

@endsection
@section('script')

@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hình ảnh</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Hình ảnh</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="padding-top: 15px;">
                    <div class="card-body table-responsive p-0">
                        @foreach($images as $value)
                            <div class="col-4" style="height: 300px; float: left; padding-bottom:15px;">
                                <img style="width: 100%; height: 100%;" src="{{ $value->path }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
