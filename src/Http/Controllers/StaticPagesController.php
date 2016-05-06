<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{

    public function pageList() {

        if (view()->exists('packages.static-pages.pages-list')) {
            return view('packages.static-pages.pages-list');
        } else {
            return view('staticPages::pages-list');
        }

    }

    public function pageView() {

        if (view()->exists('packages.static-pages.pages-view')) {
            return view('packages.static-pages.pages-view');
        } else {
            return view('staticPages::pages-view');
        }

    }

    public function indexAdmin() {
        return 'The test message.';
    }

}
