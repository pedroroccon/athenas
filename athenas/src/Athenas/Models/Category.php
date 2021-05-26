<?php

namespace Athenas\Models;

use Athenas\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    /**
     * Definindo os campos que podem 
     * ser preenchidos, evitando ataques 
     * de Mass Assingment
     *
     * @var array
     */
    protected $fillable = [
        'code', 
        'name'
    ];

    /**
     * Uma categoria pode possuir 
     * várias pessoas associadas 
     * a ela.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function peoples()
    {
        return $this->hasMany(People::class);
    }

    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('athenas.path') . '/category/' . $this->id;
    }
}