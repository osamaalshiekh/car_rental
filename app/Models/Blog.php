<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'm_title',
        'm_content',
        'keyword',
        'image',
        // Add other attributes as needed
    ];


}
