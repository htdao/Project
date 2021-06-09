@extends('backend.layouts.master')
@section('title')
Product
@endsection
@section('css')

@endsection
@section('script')

@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                    <li class="breadcrumb-item active">Sản phẩm</li>
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
                        <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Thời gian</th>
                                <th>Status</th>
                                <th>Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{$value->content}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
