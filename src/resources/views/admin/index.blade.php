@extends('admin.main')

@section('body-title')

    {{ trans('static-pages::pages.index.title') }}

    @if (view()->exists('packages.static-pages.admin.create-button'))
        @include('packages.static-pages.admin.create-button')
    @else
        @include('staticPages::admin.create-button')
    @endif

@endsection

@section('body')

    <div class="users-index">

        @if(view()->exists('packages.static-pages.admin.pages-table'))
            @include('packages.static-pages.admin.pages-table', ['pages', $pages])
        @else
            @include('staticPages::admin.pages-table', ['pages', $pages])
        @endif

    </div>

@endsection
