<?php

namespace Athenas\Models;

use Athenas\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * Definindo o nome da tabela associada 
     * para este recurso. People é o plural 
     * de person.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * Definindo os campos que podem 
     * ser preenchidos, evitando ataques 
     * de Mass Assingment
     *
     * @var array
     */
     protected $fillable = [
        'category_id', 
        'code', 
        'name', 
        'email', 
    ];

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
        return config('athenas.path') . '/person/' . $this->id;
    }
}