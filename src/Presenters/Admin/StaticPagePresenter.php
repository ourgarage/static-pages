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
    
    /**
     * Create or update static pages
     *
     * @param StaticPageDTO $dto
     * @return bool
     */
    public function createOrUpdateStaticPage(StaticPageDTO $dto)
    {
        $page = StaticPage::findOrNew($dto->getId());
        $page->title = $dto->getTitle();
        $page->content = $dto->getContent();
        $page->slug = $dto->getSlug();
        $page->meta_keywords = $dto->getMetaKeywords();
        $page->meta_description = $dto->getMetaDescription();
        $page->meta_title = $dto->getMetaTitle();
        $page->save();
        
        return true;
    }
    
    /**
     * Get page for edit
     *
     * @param int $id
     * @return object
     */
    public function getStaticPageById($id)
    {
        return StaticPage::findOrFail($id);
    }
    
    /**
     * Delete page from database
     *
     * @param int $id
     * @return bool
     */
    public function deleteStaticPage($id)
    {
        StaticPage::destroy($id);
        
        return true;
    }
}
