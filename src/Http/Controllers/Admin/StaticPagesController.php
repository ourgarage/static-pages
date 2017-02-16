<?php

namespace Ourgarage\StaticPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Presenters\Admin\StaticPagePresenter;
use Ourgarage\StaticPages\Http\Requests\StaticPageCreateRequest;
use Ourgarage\StaticPages\DTO\StaticPageDTO;
use Notifications;

class StaticPagesController extends Controller
{
    /**
     * Index page of static-pages
     *
     * @param StaticPagePresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(StaticPagePresenter $presenter)
    {
        $pages = $presenter->getAllStaticPages();
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.index.title'));

        return view('static-pages::admin.index', compact('pages'));
    }
    
    /**
     * Update status of page
     *
     * @param StaticPagePresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function statusUpdate(StaticPagePresenter $presenter, $id)
    {
        $presenter->statusUpdate($id);
        Notifications::success(trans('static-pages::pages.notifications.page-status-update'), 'top');

        return redirect()->back();
    }
    
    /**
     * Get form for create new page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        return view('static-pages::admin.page', compact('page'));
    }

    public function destroy($id)
    {
        StaticPage::destroy($id);

        Notifications::success(trans('static-pages::pages.notifications.page-delete'), 'top');

        return redirect()->back();
    }
}
