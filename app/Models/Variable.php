<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;

    public static $status = [
        'Active' => 'Active',
        'Inactive' => 'Inactive'
    ];
}
