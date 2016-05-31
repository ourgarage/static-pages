<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Ourgarage\StaticPages\Models\StaticPage;

class StaticPagesController extends Controller
{

    public function __construct()
    {
        //\Title::prepend(trans('dashboard.title.prepend'));
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

    public function indexAdmin(StaticPage $staticPages)
    {
        $pages = $staticPages->orderBy('updated_at', 'desc')->paginate(20);

        \Title::append(trans('static-pages::pages.index.title'));

        return view('staticPages::admin.pages-list', ['pages' => $pages]);
    }

}
