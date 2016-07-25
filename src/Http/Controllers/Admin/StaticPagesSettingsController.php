<?php

namespace Ourgarage\StaticPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Notifications;
use Ourgarage\StaticPages\Http\Requests\StaticPageSettingsRequest;

class StaticPagesSettingsController extends Controller
{
    public function getSettings()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.settings.title'));

        return view('static-pages::admin.settings');
    }

    public function postSettings(StaticPageSettingsRequest $request)
    {
        $config = [
            'settings.static-pages.meta-keywords' => request('meta_keywords'),
            'settings.static-pages.meta-description' => request('meta_description'),
            'settings.static-pages.meta-title' => request('meta_title'),
        ];

        conf()->put($config);
        Notifications::success(trans('static-pages::pages.notifications.settings-save'), 'top');

        return redirect()->route('static-pages::admin::get-settings');
    }
}
