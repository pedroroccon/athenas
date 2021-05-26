<?php

namespace Athenas\Models;

use Athenas\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function path()
    {
        return config('athenas.path') . '/people/' . $this->id;
    }
}