@extends('admin.main')

@section('body-title')

    {{ trans('static-pages::pages.create.title') }}

@endsection

@section('body')

    <div class="users-create">
        <div class="register-box">
            @include('admin.basis.notifications-page')
        </div>
    </div>

@endsection
