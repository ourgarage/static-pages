@if(!$pages->isEmpty())
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>{{ trans('static-pages::pages.table.title') }}</th>
                <th>{{ trans('static-pages::pages.table.created') }}</th>
                <th>{{ trans('static-pages::pages.table.options') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <th>{{ $page->id }}</th>
                    <td>{{ $page->title }}</td>
                    <td>{{ df($page->created_at) }}</td>
                    <td class="for-form-inline">
                        <form action="{{ route('static-pages::admin::status-update', ['id' => $page->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            @if($page->status == \Ourgarage\StaticPages\Models\StaticPage::STATUS_ACTIVE)
                                <button type="submit" onclick="return buttonConfirmation(event, 'Deactivate?')"
                                        class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                                        title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i></button>
                            @else
                                <button type="submit" onclick="return buttonConfirmation(event, 'Activate?')"
                                        class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="{{ trans('users.tooltip.status') }}"><i class="fa fa-power-off"></i>
                                </button>
                            @endif
                        </form>
                        <form action="{{ route('static-pages::admin::page-edit', ['id' => $page->id]) }}" method="GET">
                            <button type="submit" class="btn btn-xs btn-warning" data-toggle="tooltip"
                                    data-placement="top"
                                    title="{{ trans('users.tooltip.edit') }}"><i class="fa fa-pencil"></i>
                            </button>
                        </form>
                        <form action="{{ route('static-pages::admin::page-delete', ['id' => $page->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return buttonConfirmation(event, 'Delete?')"
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
        <i class="fa fa-filter fa-3x"></i>
        <p>{{ trans('users.search.no-results') }}</p>
    </div>
@endif
