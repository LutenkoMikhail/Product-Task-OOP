<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id', 'name', 'surname'
    ];

    public function product()
    {
        return $this->hasMany(\App\Product::class);
    }
}
