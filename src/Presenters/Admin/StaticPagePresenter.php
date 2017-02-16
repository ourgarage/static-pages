<?php

namespace Ourgarage\StaticPages\Presenters\Admin;

use Ourgarage\StaticPages\Models\StaticPage;
use Ourgarage\StaticPages\DTO\StaticPageDTO;

class StaticPagePresenter
{
    /**
     * Get all pages with pagination
     *
     * @return StaticPage[]
     */
    public function getAllStaticPages()
    {
        return StaticPage::orderBy('updated_at', 'desc')->paginate(StaticPage::PAGINATE);
    }
    
    /**
     * Update status of pages
     *
     * @param int $id
     * @return bool
     */
    public function statusUpdate($id)
    {
        $page = StaticPage::find($id);
        $page->update([
            'status' => $page->status == StaticPage::STATUS_ACTIVE ? StaticPage::STATUS_DISABLED : StaticPage::STATUS_ACTIVE,
        ]);
        
        return true;
    }
    
    public function createOrUpdateStaticPage()
    {
        
    }
}
