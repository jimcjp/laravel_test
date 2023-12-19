<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    /* 允許批量賦值的字段 */    
    protected $fillable = ['user_id', 'title', 'content', 'category_id'];



    //部落格所屬用戶
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //部落格所屬分類
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
}





