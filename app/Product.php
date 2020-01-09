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
        return $this->belongsToMany(\App\ProductGallery::class,
            'product_galleries',
            'product_id',
            'image_path')->withTimestamps();
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
        if (empty(!$author)){
            return implode(" ", $author->toArray());;
        }
        return 'No author !';
    }

    public function getAllProductCategories()
    {
        return $this->category()->get();
    }

    public function setThumbnailAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['thumbnail'] =
                str_replace('public/storage/', '', $value);
        }
    }
}
