@extends('admin.main')

@section('body-title')

    {{ trans('static-pages::pages.index.title') }}

@endsection

@section('body')

    <div class="users-index">
    @include('staticPages::admin.pages-table', ['pages', $pages])
    </div>

@endsection