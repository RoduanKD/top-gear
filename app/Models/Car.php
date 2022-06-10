<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['images'];

    protected $attributes = [
        'is_new' => false,
    ];

    protected $casts = [
        'is_new' => 'boolean',
        'description' => CleanHtml::class,
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class);
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

    // protected function featuredImage (): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $value ? "/storage/$value" : 'https://www.willow-car-sales.co.uk/wp-content/uploads/2019/11/placeholder-image-1.jpg',
    //     );
    // }
}
