<?php

namespace App\Models\Product;

use App\Models\Review\Review;
use App\Models\SubCategory\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = [
        'title',
        'short_description',
        'description',
    ];

    protected $fillable = [
        'slug',
        'SKU',

        'regular_price',
        'sale_price',

        'quantity',
        'stock',
        'status',

        'featured',
        'slide',
        'weekend',

        'image',
        'images',

        'sub_category_id',
        'user_id',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
