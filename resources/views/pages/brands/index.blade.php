@extends('layout')
@section('content')

    <div class="features_items">
        <h2 class="title text-center">{{!empty($brandName->brand_name) ? $brandName->brand_name : 'Thương hiệu sản phẩm'}}</h2>
        @if($products)
            @foreach($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/uploads/products/'. $product->product_image)}}" alt="" />
                                <h2>{{number_format($product->product_price).' '.'VND'}}</h2>
                                <p>{{$product->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{number_format($product->product_price).' '.'VND'}}</h2>
                                    <p>{{$product->product_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                <li><a href="{{route('product-detail-frontend.index', ['id' => $product->product_id])}}"><i class="fa fa-plus-square"></i>Chi tiết</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection