<?php

namespace Athenas\Models;

use Athenas\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function path()
    {
        return config('athenas.path') . '/category/' . $this->id;
    }
}