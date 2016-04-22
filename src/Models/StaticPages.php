<?php

namespace Ourgarage\StaticPages\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    protected $table = 'static-pages';

    public $timestamps = true;

    protected $fillable = ['title', 'text', 'slug', 'meta_keywords', 'meta_description', 'meta_title'];
}
