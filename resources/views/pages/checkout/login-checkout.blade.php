@extends('layout')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="#">
                            <input type="text" name="email_checkout" placeholder="Email" />
                            <input type="password" email="pass_checkout" />
                            <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng ký</h2>
                        <form action="{{route('checkout.add')}}" method="post">
                            @csrf
                            <input type="text" name="customer_name" placeholder="Họ và tên"/>
                            <input type="text" name="customer_email" placeholder="Địa chỉ email"/>
                            <input type="password" name="customer_pass" placeholder="Mật khẩu"/>
                            <input type="text" name="customer_phone" placeholder="Điện thoại"/>
                            <button type="submit" name="btn_submit_add_customer" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
@endsection