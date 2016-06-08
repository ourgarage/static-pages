@extends('admin.main')

@section('css')
    @include('staticPages::basis.css')
@endsection

@section('body-title')

    {{ trans('static-pages::pages.index.title') }}

    <a href="{{ route('static-pages::admin::create-page') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('static-pages::pages.button.create') }}
    </a>

@endsection

@section('body')

    <div class="pages-index">

        @if(view()->exists('packages.static-pages.admin.pages-table'))
            @include('packages.static-pages.admin.pages-table', ['pages', $pages])
        @else
            @include('staticPages::admin.pages-table', ['pages', $pages])
        @endif

    </div>

@endsection
