<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'content'
    ];

    protected static function booted()
    {
        static::creating(function (Post $post) {
            $post->slug = str()->slug($post->title);
        });
    }
}
