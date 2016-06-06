@extends('admin.main')

@section('css')
    @include('staticPages::basis.css')
@endsection

@section('body-title')

    {{ isset($page) ? trans('static-pages::pages.edit.title') : trans('static-pages::pages.create.title') }}

@endsection

@section('body')

    <div class="pages-create">

        @include('admin.basis.notifications-page')

        <div class="login-box-body">

            <form class="form-horizontal"
                  action="{{ route('static-pages::admin::page-store', ['id' => isset($page) ? $page->id : null]) }}"
                  method="POST">

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.title') }}"
                               @if(isset($page)) value="{{ old('title', $page->title) }}" @endif>
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="slug" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.slug') }}"
                               @if(isset($page)) value="{{ old('slug', $page->slug) }}" @endif>
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-keywords') }}"
                               @if(isset($page)) value="{{ old('meta_keywords', $page->meta_keywords) }}" @endif>
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-description') }}"
                               @if(isset($page)) value="{{ old('meta_description', $page->meta_description) }}" @endif>
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-title') }}"
                               @if(isset($page)) value="{{ old('meta_title', $page->meta_title) }}" @endif>
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <h4>{{ trans('static-pages::pages.create.form.content-head') }}</h4>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <textarea id="content" name="content" rows="15"
                                  class="form-control">@if(isset($page)){{ old('content', $page->content) }}@endif</textarea>
                    </div>
                </div>

                <button type="submit"
                        class="btn btn-primary btn-flat">{{ isset($page) ? trans('static-pages::pages.button.update') : trans('static-pages::pages.button.create') }}</button>
            </form>

        </div>
    </div>

@endsection

@section('js')
    @include('staticPages::basis.ckeditor')
@endsection
