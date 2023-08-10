<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ["title", "picture", "content", "user_id", "linked_wotd_id"];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
}
