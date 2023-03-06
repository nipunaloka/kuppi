<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_basic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'gander',
        'email',
        'upload',
    ];
}
