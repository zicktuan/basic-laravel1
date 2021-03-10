@extends('adminLayout')

@section('css')

@endsection

@section('adminContent')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Menu manage
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Menu type</th>
                        <th>Name</th>
                        {{--<th>Hiển thị</th>--}}
                        <th style="width:100px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['items'] as $item)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{$item['menu_type']}}</td>
                            <td></td>
                            {{--<td>--}}
                            {{--@if(0 == $product->product_status)--}}
                            {{--<a href="{{route('products.active', ['id'=>$product->product_id])}}"><span class="fa-thumb-stylink fa fa-thumbs-down"></span></a>--}}
                            {{--@else--}}
                            {{--<a href="{{route('products.unactive', ['id'=>$product->product_id])}}"><span class="fa-thumb-stylink fa fa-thumbs-up"></span></a>--}}
                            {{--@endif--}}
                            {{--</td>--}}
                            <td>
                                <a href="" class="active">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a href="" data-url="" class="active btn-action-del-js">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-12 text-right text-center-xs">

                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{--{{$data->links()}}--}}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection