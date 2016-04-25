<?php

namespace Ourgarage\StaticPages\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{

    const STATUS_ACTIVE = true;
    const STATUS_DISABLED = true;

    protected $table = 'static_pages';

    protected $fillable = ['status', 'title', 'text', 'slug', 'meta_keywords', 'meta_description', 'meta_title'];

}
