@extends('admin.main')

@section('body-title')

    {{ isset($page) ? trans('static-pages::pages.edit.title') : trans('static-pages::pages.create.title') }}

@endsection

@section('body')

    <div class="pages-create">

        @include('admin.basis.notifications-page')

        <div class="login-box-body">

            <form class="form-horizontal"
                  action="{{ isset($page)
                  ? route('static-pages::admin::page-update', ['id' => $page->id])
                  : route('static-pages::admin::page-store') }}" method="POST">

                @if(isset($page))
                    {{ method_field('PUT') }}
                @endif

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('static-pages::pages.create.form.title') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="title" class="form-control"
                               value="{{ isset($page) ? old('title', $page->title) : '' }}">
                        <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('static-pages::pages.create.form.slug') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="slug" class="form-control"
                               value="{{ isset($page) ? old('slug', $page->slug) : '' }}">
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('static-pages::pages.create.form.meta-keywords') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ isset($page) ? old('meta_keywords', $page->meta_keywords) :
                                conf('settings.static-pages.meta-keywords',
                                config('packages.static-pages.default-settings.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('static-pages::pages.create.form.meta-description') }} : *</label>
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               value="{{ isset($page) ? old('meta_description', $page->meta_description) :
                                conf('settings.static-pages.meta-description',
                                config('packages.static-pages.default-settings.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-md-2">{{ trans('static-pages::pages.create.form.meta-title') }} : *</label>
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
                    <div class="col-md-10">
                        <textarea id="content" name="content" rows="15" class="form-control">
                            {{ isset($page) ? old('content', $page->content) : ''}}
                        </textarea>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat">
                            {{ isset($page)
                            ? trans('static-pages::pages.button.update')
                            : trans('static-pages::pages.button.create') }}
                        </button>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-8">
                        <a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                            {{ trans('static-pages::pages.button.back') }}
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('css')
    <link href='/packages/static-pages/css/static-pages.css' rel='stylesheet' type='text/css'>
@endsection

@section('js')
    @inject('connect', 'App\Http\ViewConnectors\EditorConnector')

    {!! $connect->connect('#content', App::getLocale(), route('contacts::admin::imageUpload'), 'full') !!}
@endsection
