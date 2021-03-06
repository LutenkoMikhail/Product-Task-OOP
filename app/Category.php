<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'parent_id', 'name'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,
            'product_categories',
            'category_id',
            'product_id'
        )->withTimestamps();
    }

    public function getNameParent()
    {
        if ($this->parent_id !== null) {
            return Category::find($this->parent_id)->name;
        }
        return 'Root category.';
    }

}
