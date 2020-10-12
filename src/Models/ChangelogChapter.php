<?php

namespace webbundels\changelog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ChangelogChapter extends Model
{
    public $timestamps = true;
    
    protected $fillable = ['title', 'body', 'sequence'];

    protected static function booted()
    {
        static::addGlobalScope('default_order', function (Builder $builder) {
            $builder->orderBy('sequence');
        });
    }
}