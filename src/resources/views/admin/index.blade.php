@extends('admin.main')

@section('body-title')

    {{ trans('static-pages::pages.index.title') }}

    <form class="pull-right" action="{{ route('static-pages::admin::create-page') }}" method="GET">
        <button class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('static-pages::pages.button.create') }}
        </button>
    </form>

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
