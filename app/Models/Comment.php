<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 可以批量賦值的項目

    protected $fillable = ['user_id','blog_id','content'];


    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
