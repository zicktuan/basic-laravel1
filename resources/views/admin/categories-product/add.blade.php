@extends('adminLayout')
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm danh mục sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('categories-product.store')}}" role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả danh mục sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" placeholder="Mô tả danh mục sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="category_product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="btn_submit_add_cat_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection