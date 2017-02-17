@extends('admin.main')

@section('body-title')

    {{ trans('static-pages::pages.index.title') }}

    <a href="{{ route('static-pages::admin::create-page') }}" class="pull-right btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('static-pages::pages.button.create') }}
    </a>

@endsection

@section('body')

    <div class="pages-index">
        @include('static-pages::admin.pages-table', compact('pages'))
    </div>

@endsection

@section('css')
    <link href='/packages/static-pages/css/static-pages.css' rel='stylesheet' type='text/css'>
@endsection
