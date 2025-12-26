<?php

namespace App\Models\Rules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicyTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public $timestamps = false;
}
