@extends('adminLayout')
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhập thương hiệu sản phẩm
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
                            <form action="{{route('brand-product.update', ['id' => $brandProduct->brand_id])}}" role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" value="{{$brandProduct->brand_name}}" class="form-control" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả thương hiệu sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" placeholder="Mô tả thương hiệu sản phẩm">{{$brandProduct->brand_desc}}</textarea>
                                </div>
                                <button type="submit" name="btn_submit_add_brand_product" class="btn btn-info">Update</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection