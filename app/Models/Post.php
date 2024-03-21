<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'post', 'author_id', 'thumbnail', 'slug'];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
