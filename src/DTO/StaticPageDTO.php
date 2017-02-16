<?php

namespace Ourgarage\StaticPages\DTO;

class StaticPageDTO
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var int;
     */
    private $status;
    
    /**
     * @var string
     */
    private $title;
    
    /**
     * @var string
     */
    private $content;
    
    /**
     * @var string
     */
    private $slug;
    
    /**
     * @var string
     */
    private $metaKeywords;
    
    /**
     * @var string
     */
    private $metaDescription;
    
    /**
     * @var string
     */
    private $metaTitle;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return StaticPageDTO
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @param int $status
     * @return StaticPageDTO
     */
    public function setStatus($status)
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return StaticPageDTO
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * @param string $content
     * @return StaticPageDTO
     */
    public function setContent($content)
    {
        $this->content = $content;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * @param string $slug
     * @return StaticPageDTO
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }
    
    /**
     * @param string $metaKeywords
     * @return StaticPageDTO
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }
    
    /**
     * @param string $metaDescription
     * @return StaticPageDTO
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }
    
    /**
     * @param string $metaTitle
     * @return StaticPageDTO
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
        
        return $this;
    }
}
