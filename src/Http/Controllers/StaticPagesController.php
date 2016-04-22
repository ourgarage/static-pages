<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{

    public function page_list() {
        return view('static_pages::page_list');
    }

    public function page_view() {
        return view('static_pages::page_view');
    }

}
