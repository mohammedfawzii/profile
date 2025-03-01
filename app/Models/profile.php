<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model implements HasMedia
{
    use InteractsWithMedia,HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'address',
        'email',
        'phone_number',
        'gender',
        'birthdate',
    ];
}
