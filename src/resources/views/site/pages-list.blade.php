@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('static-pages::pages.view.header') }}</div>
                    <div class="panel-body">
                        @if(!$pages->isEmpty())
                            <ul>
                                @foreach($pages as $page)
                                    <li>
                                        <a href="{{ route('static-pages::page-view', ['slug' => $page->slug]) }}">
                                            {{ $page->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            {{ trans('static-pages::pages.view.no-pages') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
