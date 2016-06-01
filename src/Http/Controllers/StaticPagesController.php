<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Models\StaticPage;
use Notifications;

class StaticPagesController extends Controller
{

    public function indexAdmin(StaticPage $staticPages)
    {
        $pages = $staticPages->orderBy('updated_at', 'desc')->paginate(20);

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.index.title'));

        if (view()->exists('packages.static-pages.admin.index')) {
            return view('packages.static-pages.admin.index', ['pages' => $pages]);
        } else {
            return view('staticPages::admin.index', ['pages' => $pages]);
        }

    }

    public function statusUpdate($id, StaticPage $page)
    {
        $page = $page->find($id);

        $page->update([
            'status' => $page->status == StaticPage::STATUS_ACTIVE ? StaticPage::STATUS_DISABLED : StaticPage::STATUS_ACTIVE,
        ]);

        Notifications::success(trans('users.notification.status-change-update'), 'top');

        return redirect()->back();
    }

    public function createPage()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.create.title'));

        if (view()->exists('packages.static-pages.admin.create-page')) {
            return view('packages.static-pages.admin.create-page');
        } else {
            return view('staticPages::admin.create-page');
        }

    }

    public function pageList()
    {

        if (view()->exists('packages.static-pages.pages-list')) {
            return view('packages.static-pages.pages-list');
        } else {
            return view('staticPages::pages-list');
        }

    }

    public function pageView()
    {

        if (view()->exists('packages.static-pages.pages-view')) {
            return view('packages.static-pages.pages-view');
        } else {
            return view('staticPages::pages-view');
        }

    }

    public function destroy($id)
    {
        StaticPage::destroy($id);

        Notifications::success(trans('users.notification.user-delete'), 'top');

        return redirect()->back();
    }

}
