<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
    }


    public function reply(){
        return $this->hasOne(Comment::class,"comment_id","id");
    }
    public function replies(){
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
}
