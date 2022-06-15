<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'active'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
