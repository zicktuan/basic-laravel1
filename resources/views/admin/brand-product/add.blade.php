@extends('adminLayout')
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm thương hiệu sản phẩm
                    </header>

                    @if ($errors->any())
                        <br>
                        <br>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <center>{{ $error }}</center>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('brand-product.store')}}" role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" class="form-control" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả thương hiệu sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" placeholder="Mô tả thương hiệu sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="brand_product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="btn_submit_add_brand_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection