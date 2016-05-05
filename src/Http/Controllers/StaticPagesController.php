<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{

    public function page_list() {

        if (view()->exists('packages.static-pages.pages-list')) {
            return view('packages.static-pages.pages-list');
        } else {
            return view('static_pages::pages-list');
        }

    }

    public function page_view() {

        if (view()->exists('packages.static-pages.pages-view')) {
            return view('packages.static-pages.pages-view');
        } else {
            return view('static_pages::pages-view');
        }

    }

    public function page_index() {
        return 'The test message.';
    }

}
