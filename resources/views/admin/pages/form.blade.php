@extends('adminLayout')
@section('js')
    <script src="{{asset('public/backend/admins/page/js/handleForm.js')}}"></script>
@endsection
@section('adminContent')
    <div class="form-w3layouts">
        <div class="row">
            <?php

                $checkPage = false;
                if ( isset($page) && null !== $page ) {
                    $checkPage = true;
                } else {
                    $checkPage = false;
                }

            ?>
            <div style="display: none" class="alert alert-success info-after-sm" role="alert"></div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ $checkPage ? 'Update Page' : 'Add Page' }}
                    </header>

                    <div class="panel-body">
                        <div class="position-center">
                            <form action="" role="form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text"
                                           name="page_title"
                                           value="{{ $checkPage ? $page->title : '' }}"
                                           class="form-control page-title"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text"
                                           name="page_slug"
                                           value="{{ $checkPage ? $page->slug : '' }}"
                                           class="form-control page-slug">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea style="resize: none" rows="8" class="form-control page-content" name="page_content">{{ $checkPage ? $page->content : '' }}</textarea>
                                </div>

                                <input type="hidden" name="user_id" value="<?php echo auth()->id() ?>">

                                @if($checkPage)
                                    <input type="hidden" class="request-url-update" value="{{ route('page-api.update', ['id' => $page->id]) }}">
                                    <button type="button" class="btn btn-info btn-action-update-page-js">Update</button>
                                @else
                                    <button type="button" data-url="{{ route('page-api.create') }}" class="btn btn-info btn-action-add-page-js">Add</button>
                                @endif

                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection