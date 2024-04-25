<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }

    public function attachPost($post) {
        $this->attach($post);
    }
}
