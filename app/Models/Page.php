<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Page extends Model
{
    use HasFactory , HasTranslations;

    public $translatable = ['description'];

    protected $fillable = [
        'key',
        'description',
    ];
}
