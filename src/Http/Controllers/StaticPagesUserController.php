<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Presenters\StaticPagePresenter;

class StaticPagesUserController extends Controller
{
    
    /**
     * Get list pages
     *
     * @param StaticPagePresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pageList(StaticPagePresenter $presenter)
    {
        $pages = $presenter->getActivePages();

        return view('static-pages::site.pages-list', compact('pages'));
    }
    
    /**
     * Get page by slug
     *
     * @param StaticPagePresenter $presenter
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pageView(StaticPagePresenter $presenter, $slug)
    {
        $page = $presenter->getPageBySlug($slug);

        if (is_null($page)) {
            return abort('404');
        }

        return view('static-pages::site.pages-view', compact('page'));
    }
}
