<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'is_new' => false,
    ];

    protected $casts = [
        'is_new' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
