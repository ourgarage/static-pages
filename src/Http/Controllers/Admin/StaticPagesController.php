<?php

namespace Ourgarage\StaticPages\Http\Controllers\Admin;

use Ourgarage\StaticPages\Http\Requests\StaticPageCreateRequest;
use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Models\StaticPage;
use Notifications;

class StaticPagesController extends Controller
{

    public function index(StaticPage $staticPages)
    {
        $pages = $staticPages->orderBy('updated_at', 'desc')->paginate(20);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.index.title'));

        return view('static-pages::admin.index', ['pages' => $pages]);
    }

    public function statusUpdate($id, StaticPage $page)
    {
        $page = $page->find($id);

        $page->update([
            'status' => $page->status == StaticPage::STATUS_ACTIVE ? StaticPage::STATUS_DISABLED : StaticPage::STATUS_ACTIVE,
        ]);

        Notifications::success(trans('static-pages::pages.notifications.page-status-update'), 'top');

        return redirect()->back();
    }

    public function create()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.create.title'));

        return view('static-pages::admin.page');
    }

    public function store(StaticPageCreateRequest $request, $id = null)
    {
        $page = StaticPage::findOrNew($id);

        $page->title = $request->title;
        $page->content = $request->content;
        $page->slug = $request->slug;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->meta_title = $request->meta_title;

        $translationKey = (is_null($page->id))
            ? 'static-pages::pages.notifications.page-created-success'
            : 'static-pages::pages.notifications.page-update' ;

        $page->save();

        Notifications::success(trans($translationKey), 'top');

        return redirect()->route('static-pages::admin::index');
    }

    public function edit($id, StaticPage $page)
    {
        $page = $page->find($id);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.edit.title'));

        return view('static-pages::admin.page', ['page' => $page]);
    }

    public function destroy($id)
    {
        StaticPage::destroy($id);

        Notifications::success(trans('static-pages::pages.notifications.page-delete'), 'top');

        return redirect()->back();
    }
}
