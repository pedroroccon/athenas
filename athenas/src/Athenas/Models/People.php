<?php

namespace Athenas\Models;

use Athenas\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    /**
     * Uma pessoa possui uma categoria 
     * associada a ela.
     *
     * @return \Athenas\Models\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('athenas.path') . '/people/' . $this->id;
    }
}