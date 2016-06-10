<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Models\StaticPage;

class StaticPagesUserController extends Controller
{

    public function pageList(StaticPage $staticPages)
    {
        $pages = $staticPages->where('status', $staticPages::STATUS_ACTIVE)->orderBy('updated_at', 'desc')->get();

        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.index.title'));

        return view('static-pages::site.pages-list', compact('pages'));
    }

    public function pageView()
    {
        return view('static-pages::site.pages-view');
    }
}
