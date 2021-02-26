@extends('adminLayout')
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhập sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('products.update', ['id' => $product->product_id])}}" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" value="{{ !empty($product->product_image) ? $product->product_image : '' }}">
                                    <img src="{{asset('public/uploads/products/'.$product->product_image)}}" height="100" width="100" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" placeholder="Mô tả sản phẩm">{{$product->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" placeholder="Nội dung sản phẩm">{{$product->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_cat">
                                        <option value="0" disabled>Choose here</option>
                                        @foreach ($categories as $cat)
                                            @if ($cat->cat_id === $product->cat_id)
                                                <option selected value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                                            @else
                                                <option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_brand">
                                        <option value="0" disabled>Choose here</option>
                                        @foreach ($brands as $brand)
                                            @if ($brand->brand_id === $product->cat_id)
                                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @else
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" name="btn_submit_add_cat_product" class="btn btn-info">Cập nhập sản phẩm</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection