<?php

namespace Ourgarage\StaticPages\Presenters;

use Ourgarage\StaticPages\Models\StaticPage;

class StaticPagePresenter
{
    /**
     * Get all active pages
     *
     * @return StaticPage[]
     */
    public function getActivePages()
    {
        return StaticPage::where('status', StaticPage::STATUS_ACTIVE)->orderBy('updated_at', 'desc')->get();
    }
    
    /**
     * Get page by slug
     *
     * @param string $slug
     * @return object
     */
    public function getPageBySlug($slug)
    {
        return StaticPage::where('status', StaticPage::STATUS_ACTIVE)->where('slug', $slug)->first();
    }
}
