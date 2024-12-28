<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banners extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_input_1',
        'text_input_2',
        'text_input_3',
        'image',
    ];

    
}
