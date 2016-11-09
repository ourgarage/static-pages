@extends('admin.main')

@section('css')
    @include('static-pages::basis.css')

    <link href="/libs/trumbowyg/dist/ui/trumbowyg.min.css" rel="stylesheet" type='text/css'>
    <link href="/libs/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css" rel="stylesheet" type='text/css'>
@endsection

@section('body-title')

    {{ isset($page) ? trans('static-pages::pages.edit.title') : trans('static-pages::pages.create.title') }}

@endsection

@section('body')

    <div class="pages-create">

        @include('admin.basis.notifications-page')

        <div class="login-box-body">

            <form class="form-horizontal"
                  action="{{ isset($page) ? route('static-pages::admin::page-update', ['id' => $page->id]) : route('static-pages::admin::page-store') }}"
                  method="POST">

                @if(isset($page))
                    {{ method_field('PUT') }}
                @endif

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.title') }}"
                               value="{{ isset($page) ? old('title', $page->title) : '' }}">
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="slug" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.slug') }}"
                               value="{{ isset($page) ? old('slug', $page->slug) : '' }}">
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-keywords') }}"
                               value="{{ isset($page) ? old('meta_keywords', $page->meta_keywords) :
                                conf('settings.static-pages.meta-keywords',
                                config('packages.static-pages.default-settings.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-description') }}"
                               value="{{ isset($page) ? old('meta_description', $page->meta_description) :
                                conf('settings.static-pages.meta-description',
                                config('packages.static-pages.default-settings.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               placeholder="{{ trans('static-pages::pages.create.form.meta-title') }}"
                               value="{{ isset($page) ? old('meta_title', $page->meta_title) :
                                conf('settings.static-pages.meta-title',
                                config('packages.static-pages.default-settings.meta-title')) }}">
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <h4>{{ trans('static-pages::pages.create.form.content-head') }}</h4>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <textarea id="content" name="content" rows="15"
                                  class="form-control">{{ isset($page) ? old('content', $page->content) : ''}}</textarea>
                    </div>
                </div>

                <button type="submit"
                        class="btn btn-primary btn-flat">{{ isset($page) ? trans('static-pages::pages.button.update') : trans('static-pages::pages.button.create') }}</button>
            </form>

        </div>
    </div>

@endsection

@section('js')

    @inject('connect', 'App\Http\ViewConnectors\EditorConnector')

    {!! $connect->connect('#content', App::getLocale(), route('contacts::admin::imageUpload'), 'full') !!}

@endsection
