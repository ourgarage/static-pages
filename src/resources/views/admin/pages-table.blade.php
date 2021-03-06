@if(!$pages->isEmpty())
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>{{ trans('static-pages::pages.table.slug') }}</th>
                <th>{{ trans('static-pages::pages.table.title') }}</th>
                <th>{{ trans('static-pages::pages.table.created') }}</th>
                <th>{{ trans('static-pages::pages.table.options') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <th>{{ $page->id }}</th>
                    <td><a href="/pages/{{ $page->slug }}" target="_blank">{{ $page->slug }}</a></td>
                    <td>{{ $page->title }}</td>
                    <td>{{ df($page->created_at) }}</td>
                    <td class="for-form-inline">
                        <form action="{{ route('static-pages::admin::status-update', ['id' => $page->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            @if($page->status == \Ourgarage\StaticPages\Models\StaticPage::STATUS_ACTIVE)
                                <button type="submit"
                                        onclick="return buttonConfirmation(event, '@lang('static-pages::pages.edit.deactivate')')"
                                        class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                                        title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i></button>
                            @else
                                <button type="submit"
                                        onclick="return buttonConfirmation(event, '@lang('static-pages::pages.edit.activate')')"
                                        class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="{{ trans('users.tooltip.status') }}"><i class="fa fa-power-off"></i>
                                </button>
                            @endif
                        </form>

                        <a href="{{ route('static-pages::admin::page-edit', ['id' => $page->id]) }}"
                           class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                           title="{{ trans('users.tooltip.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <form action="{{ route('static-pages::admin::page-delete', ['id' => $page->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return buttonConfirmation(event, '@lang('static-pages::pages.edit.delete')')"
                                    class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="{{ trans('users.tooltip.delete') }}">
                                <i class="fa fa-remove"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $pages->render() !!}
    </div>
@else
    <div class="no-results text-center">
        <i class="fa fa-exclamation-triangle fa-3x"></i>
        <p>{{ trans('static-pages::pages.index.no-pages') }}</p>
    </div>
@endif
