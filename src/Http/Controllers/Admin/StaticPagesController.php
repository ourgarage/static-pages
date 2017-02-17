<?php

namespace Ourgarage\StaticPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Notifications;
use Ourgarage\StaticPages\DTO\StaticPageDTO;
use Ourgarage\StaticPages\Http\Requests\StaticPageCreateRequest;
use Ourgarage\StaticPages\Presenters\Admin\StaticPagePresenter;

class StaticPagesController extends Controller
{
    /**
     * Index page of static-pages
     *
     * @param StaticPagePresenter $presenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(StaticPagePresenter $presenter)
    {
        $pages = $presenter->getAllStaticPages();
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.index.title'));
        
        return view('static-pages::admin.index', compact('pages'));
    }
    
    /**
     * Update status of page
     *
     * @param StaticPagePresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function statusUpdate(StaticPagePresenter $presenter, $id)
    {
        $presenter->statusUpdate($id);
        Notifications::success(trans('static-pages::pages.notifications.page-status-update'), 'top');
        
        return redirect()->back();
    }
    
    /**
     * Get form for create new page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.create.title'));
        
        return view('static-pages::admin.page');
    }
    
    /**
     * Create or update static pages
     *
     * @param StaticPageCreateRequest $request
     * @param StaticPagePresenter $presenter
     * @param int|null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StaticPageCreateRequest $request, StaticPagePresenter $presenter, $id = null)
    {
        $dto = new StaticPageDTO();
        $dto->setId($id);
        $dto->setTitle($request->title);
        $dto->setContent($request->content);
        $dto->setSlug($request->slug);
        $dto->setMetaKeywords($request->meta_keywords);
        $dto->setMetaDescription($request->meta_description);
        $dto->setMetaTitle($request->meta_title);
        
        $presenter->createOrUpdateStaticPage($dto);
        $translationKey = (is_null($id))
            ? 'static-pages::pages.notifications.page-created-success'
            : 'static-pages::pages.notifications.page-update';
        Notifications::success(trans($translationKey), 'top');
        
        return redirect()->route('static-pages::admin::index');
    }
    
    /**
     * Get static page by id
     *
     * @param StaticPagePresenter $presenter
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StaticPagePresenter $presenter, $id)
    {
        $page = $presenter->getStaticPageById($id);
        \Title::prepend(trans('dashboard.title.prepend'));
        \Title::append(trans('static-pages::pages.edit.title'));
        
        return view('static-pages::admin.page', compact('page'));
    }
    
    /**
     * Delete static page
     *
     * @param StaticPagePresenter $presenter
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StaticPagePresenter $presenter, $id)
    {
        $presenter->deleteStaticPage($id);
        Notifications::success(trans('static-pages::pages.notifications.page-delete'), 'top');
        
        return redirect()->back();
    }
}
