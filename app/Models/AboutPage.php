<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'vision',
        'slider_name',
        'slider_image',
    ];
}
