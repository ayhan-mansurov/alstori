<?php

namespace App\Models\SubCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
    ];

    public $timestamps = false;
}
