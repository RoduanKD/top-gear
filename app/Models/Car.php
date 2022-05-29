<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function isNew(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'yes':'no',
        );
    }
}
