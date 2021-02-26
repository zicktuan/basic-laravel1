@extends('adminLayout')
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('products.store')}}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_cat">
                                        <option value="0" disabled>Choose here</option>
                                        @if (!empty($categories))
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_brand">
                                        <option value="0" disabled>Choose here</option>
                                        @if (!empty($brands))
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="btn_submit_add_cat_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection