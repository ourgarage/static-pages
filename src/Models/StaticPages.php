<?php

namespace Ourgarage\StaticPages\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    protected $table = 'static_pages';

    protected $fillable = ['title', 'text', 'slug', 'meta_keywords', 'meta_description', 'meta_title'];
}
