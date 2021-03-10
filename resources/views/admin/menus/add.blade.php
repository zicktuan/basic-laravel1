@extends('adminLayout')
@section('js')
    {{--<script src="{{asset('public/backend/admins/category/js/handleForm.js')}}"></script>--}}
@endsection
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <div style="display: none" class="alert alert-success info-after-sm" role="alert"></div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add menu
                    </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form action="{{route('menu-api.create')}}" role="form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Type</label>
                                    <input class="form-control" name="menu_type" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-check-input" name="object_id[]" type="checkbox" value="1">
                                    <label>Default checkbox</label>
                                </div>
                                <div class="form-group">
                                    <input class="form-check-input" name="object_id[]" type="checkbox" value="2">
                                    <label>Checked checkbox</label>

                                </div>

                                <button type="submit" class="btn btn-info">Add</button>

                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection