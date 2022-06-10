<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\App;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['image'];

    protected $fillable = ['name_en', 'name_ar', 'capacity'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    // protected function featuredImage (): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $value ? "/storage/$value" : 'https://www.willow-car-sales.co.uk/wp-content/uploads/2019/11/placeholder-image-1.jpg',
    //     );
    // }
    protected function name (): Attribute
    {
        return Attribute::make(
            get: fn () => App::isLocale('ar') ? $this->name_ar : $this->name_en,
        );
    }
}
