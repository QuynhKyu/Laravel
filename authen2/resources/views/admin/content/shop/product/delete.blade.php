@extends('admin.layouts.glance')
@section('title')
    Xóa snr phẩm
@endsection
@section('content')
    <h1> Xóa sản phẩm {{ $product->id .' : '. $product->name }} </h1>

    <div class="row">
        <h3 class="title1"></h3>
        <div class="form-three widget-shadow">
            <form name="category" action="{{ url('admin/shop/product/'.$product->id.'/delete') }}" method="post" class="form-horizontal">
            @csrf <!-- thêm token sửa lỗi 419-->

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>

            </form>
        </div>
    </div>


@endsection
