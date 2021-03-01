@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Hình ảnh</td>
                    <td class="description">Mô tả</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng tiền</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php $cartContent = Cart::content(); ?>
                @foreach($cartContent as $content)
                    <tr>
                        <td class="cart_product">
                            <a href="">
                                <img src="{{asset('public/uploads/products/'. $content->options->image)}}" width="50" alt="" />
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$content->name}}</a></h4>
                            <p>Web ID: {{$content->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($content->price) .' '.'VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{route('cart.update', ['id' => $content->rowId])}}" method="POST">
                                    @csrf
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$content->qty}}" autocomplete="off" size="2">
                                    <input type="hidden" name="rowId_cart" value="{{$content->rowId}}">
                                    <input type="submit" name="update_qty" class="btn btn-primary btn-sm" value="Cập nhập">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                $subTotal = $content->qty * $content->price;
                                echo number_format($subTotal) .' VNĐ';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('cart.delete', ['id' => $content->rowId])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            {{--<div class="col-sm-6">--}}
                {{--<div class="chose_area">--}}
                    {{--<ul class="user_option">--}}
                        {{--<li>--}}
                            {{--<input type="checkbox">--}}
                            {{--<label>Use Coupon Code</label>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<input type="checkbox">--}}
                            {{--<label>Use Gift Voucher</label>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<input type="checkbox">--}}
                            {{--<label>Estimate Shipping & Taxes</label>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<ul class="user_info">--}}
                        {{--<li class="single_field">--}}
                            {{--<label>Country:</label>--}}
                            {{--<select>--}}
                                {{--<option>United States</option>--}}
                                {{--<option>Bangladesh</option>--}}
                                {{--<option>UK</option>--}}
                                {{--<option>India</option>--}}
                                {{--<option>Pakistan</option>--}}
                                {{--<option>Ucrane</option>--}}
                                {{--<option>Canada</option>--}}
                                {{--<option>Dubai</option>--}}
                            {{--</select>--}}

                        {{--</li>--}}
                        {{--<li class="single_field">--}}
                            {{--<label>Region / State:</label>--}}
                            {{--<select>--}}
                                {{--<option>Select</option>--}}
                                {{--<option>Dhaka</option>--}}
                                {{--<option>London</option>--}}
                                {{--<option>Dillih</option>--}}
                                {{--<option>Lahore</option>--}}
                                {{--<option>Alaska</option>--}}
                                {{--<option>Canada</option>--}}
                                {{--<option>Dubai</option>--}}
                            {{--</select>--}}

                        {{--</li>--}}
                        {{--<li class="single_field zip-field">--}}
                            {{--<label>Zip Code:</label>--}}
                            {{--<input type="text">--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<a class="btn btn-default update" href="">Get Quotes</a>--}}
                    {{--<a class="btn btn-default check_out" href="">Continue</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tạm tính <span>{{Cart::total() .' '. 'VNĐ'}}</span></li>
                        <li>Thuế <span>{{Cart::tax()}}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total() .' '. 'VNĐ'}}</span></li>
                    </ul>
                    {{--<a class="btn btn-default update" href="">Update</a>--}}
                    <a class="btn btn-default check_out" href="{{route('checkout.login')}}">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
