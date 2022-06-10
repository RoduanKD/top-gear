<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }

    protected function featuredImage (): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? "/storage/$value" : 'https://th.bing.com/th/id/R.a4a1b34e9d9c2e4148674a8f2f02e294?rik=JaAU7TXQS2r7Gw&riu=http%3a%2f%2fpasmart.ir%2fassets%2fimages%2fmembers%2fuser-placeholder_man.png&ehk=xXaouMHsmH2Z0kCHmZGBMgVeLT%2byOtUI%2brN86T2eauM%3d&risl=&pid=ImgRaw&r=0',
        );
    }
}
