@extends('adminLayout')
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sửa danh mục sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('categories-product.update', ['id' => $catProduct->cat_id])}}" role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" name="category_product_name" value="{{$catProduct->cat_name}}" class="form-control" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả danh mục sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" placeholder="Mô tả danh mục sản phẩm">{{$catProduct->cat_desc}}</textarea>
                                </div>
                                <button type="submit" name="btn_submit_add_cat_product" class="btn btn-info">Cập nhập danh mục</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection