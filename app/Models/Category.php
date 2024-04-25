<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
