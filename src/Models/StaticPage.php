<?php

namespace Ourgarage\StaticPages\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;

    protected $table = 'static_pages';

    protected $fillable = ['status', 'title', 'content', 'slug', 'meta_keywords', 'meta_description', 'meta_title'];

}
