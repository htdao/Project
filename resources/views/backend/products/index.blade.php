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
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm mới nhập</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>
                                    @if(count($value->images) > 0)
                                        <img src="{{$value->images[0]->image_url}}" width="40px">
                                    @endif
                                </td>
                                <td><a href="{{ route('backend.product.edit', ['product' => $value->id]) }}">{{$value->name}}</a></td>
                                <td>{{$value->updated_at}}</td>
                                <td>
                                    @foreach(\App\Models\Product::$status_text as $key => $v)
                                        @if($key == $value->status)
                                            <p>{{$v}}</p>
                                        @endif
                                    @endforeach
{{--                                    @if($value->status == 0)--}}
{{--                                        <span class="badge bg-warning widspan">{{ $value->status_text }}</span>--}}
{{--                                    @elseif($value->status == 1)--}}
{{--                                        <span class="badge bg-success widspan">{{ $value->status_text }}</span>--}}
{{--                                    @else--}}
{{--                                        <span class="badge bg-danger widspan">{{ $value->status_text }}</span>--}}
{{--                                    @endif--}}

                                </td>
                                <td>
{{--                                    @if(\Illuminate\Support\Facades\Gate::allows('update-product',$value))--}}
{{--                                        <button>edit</button>--}}
{{--                                    @endif--}}
{{--                                    @if(\Illuminate\Support\Facades\Gate::allows('delete-product',$value))--}}
{{--                                            <button>delete</button>--}}
{{--                                        @endif--}}
                                    @can('update', $value)
                                        <button>edit</button>
                                        <button>delete</button>
                                    @endcan
                                    @cannot('update', $value)
                                        <button disabled>edit</button>
                                        <button disabled>detele</button>
                                    @endcannot


                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div>{{ $products->links() }}</div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
