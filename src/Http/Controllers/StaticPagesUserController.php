<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Models\StaticPage;

class StaticPagesUserController extends Controller
{

    public function pageList()
    {
        if (view()->exists('packages.static-pages.pages-list')) {
            return view('packages.static-pages.pages-list');
        } else {
            return view('staticPages::site.pages-list');
        }
    }

    public function pageView()
    {
        if (view()->exists('packages.static-pages.pages-view')) {
            return view('packages.static-pages.pages-view');
        } else {
            return view('staticPages::site.pages-view');
        }
    }
}
