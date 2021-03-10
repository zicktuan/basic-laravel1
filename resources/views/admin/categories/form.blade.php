@extends('adminLayout')
@section('js')
    <script src="{{asset('public/backend/admins/category/js/handleForm.js')}}"></script>
@endsection
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <?php

            $checkPage = false;
            if ( isset($cat) && null !== $cat ) {
                $checkPage = true;
            } else {
                $checkPage = false;
            }

            ?>
            <div style="display: none" class="alert alert-success info-after-sm" role="alert"></div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ $checkPage ? 'Update Category' : 'Add Category' }}
                    </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form action="" role="form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text"
                                           name="cat_name"
                                           value="{{ $checkPage ? $cat->name : '' }}"
                                           class="form-control cat-name"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text"
                                           name="cat_slug"
                                           value="{{ $checkPage ? $cat->slug : '' }}"
                                           class="form-control cat-slug">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea style="resize: none" rows="8" class="form-control cat-description" name="cat_desc">{{ $checkPage ? $cat->description : '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Parent ID</label>
                                    <select class="form-control input-sm m-bot15 parent-id" name="parent_id">
                                        <option value="0">Choose category</option>
                                        {!! $htmlOption !!}
                                    </select>
                                </div>

                                <input type="hidden" name="user_id" value="<?php echo auth()->id() ?>">

                                @if($checkPage)
                                    <input type="hidden" class="request-url-update" value="{{ route('cat-api.update', ['id' => $cat->id]) }}">
                                    <button type="button" class="btn btn-info btn-action-update-page-js">Update</button>
                                @else
                                    <button type="button" data-url="{{ route('cat-api.create') }}" class="btn btn-info btn-action-add-page-js">Add</button>
                                @endif

                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection