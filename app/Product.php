<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'author_id', 'title', 'description', 'short_description', 'sku',
        'price', 'thumbnail'
    ];

    public function gallery()
    {
        return $this->belongsToMany(ProductGallery::class,
            'product_galleries',
            'product_id',
            'image_path')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsToMany(Category::class,
            'product_categories',
            'product_id',
            'category_id')->withTimestamps();
    }

    public function setThumbnailAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['thumbnail'] =
                str_replace('public/storage/', '', $value);
        }
    }
}
