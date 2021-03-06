<?php

namespace Webbundels\Changelog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ChangelogChapter extends Model
{
    public $timestamps = true;
    
    protected $fillable = ['title', 'body'];
}
