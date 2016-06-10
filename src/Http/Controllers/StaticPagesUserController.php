<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Models\StaticPage;

class StaticPagesUserController extends Controller
{

    public function pageList(StaticPage $staticPages)
    {
        $pages = $staticPages->where('status', $staticPages::STATUS_ACTIVE)->orderBy('updated_at', 'desc')->get();

        return view('static-pages::site.pages-list', compact('pages'));
    }

    public function pageView(StaticPage $staticPages, $slug)
    {
        $page = $staticPages->where('status', $staticPages::STATUS_ACTIVE)->where('slug', $slug)->get()->first();

        if (is_null($page)) {
            return abort('404');
        }

        return view('static-pages::site.pages-view', compact('page'));
    }
}
