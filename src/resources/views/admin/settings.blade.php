@extends('admin.main')

@section('css')
    @include('static-pages::basis.css')
@endsection

@section('body-title')
    {{ trans('static-pages::pages.settings.title') }}
@endsection

@section('body')
    <div class="settings-index">

        @include('admin.basis.notifications-page')

        <div class="login-box-body">

            <form class="form-horizontal" action="{{ route('static-pages::admin::post-settings') }}" method="POST">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('static-pages::pages.create.form.meta-keywords') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ conf('settings.static-pages.meta-keywords',
                                config('packages.static-pages.default-settings.meta-keywords')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('static-pages::pages.create.form.meta-description') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_description" class="form-control"
                               value="{{ conf('settings.static-pages.meta-description',
                                config('packages.static-pages.default-settings.meta-description')) }}">
                        <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-md-2">
                        {{ trans('static-pages::pages.create.form.meta-title') }} :
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="meta_title" class="form-control"
                               value="{{ conf('settings.static-pages.meta-title',
                                config('packages.static-pages.default-settings.meta-title')) }}">
                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-flat">{{ trans('static-pages::pages.button.save') }}</button>

            </form>

        </div>

    </div>
@endsection
