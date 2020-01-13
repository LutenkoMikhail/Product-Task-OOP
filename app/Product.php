<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'author_id', 'title', 'description', 'short_description', 'sku',
        'price', 'thumbnail'
    ];

    public function galleries()
    {
        return $this->hasMany(\App\ProductGallery::class);
    }

    public function author()
    {
        return $this->belongsTo(\App\Author::class);
    }

    public function category()
    {
        return $this->belongsToMany(\App\Category::class,
            'product_categories',
            'product_id',
            'category_id')->withTimestamps();
    }

    public function getNameAuthor()
    {
        $author = $this->author()->first(['name', 'surname']);
        if (empty(!$author)) {
            return implode(" ", $author->toArray());;
        }
        return 'No author !';
    }

    public function getAllProductCategories()
    {
        return $this->category()->get();
    }

    public function getImageFromGallery()
    {
        return $this->galleries()->get('image_path');

    }

    public function setThumbnailAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['thumbnail'] =
                str_replace('public/storage/', '', $value);
        }
    }
}
