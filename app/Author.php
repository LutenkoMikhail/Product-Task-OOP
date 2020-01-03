<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id', 'name', 'surname'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
