<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'status',
        'published_at',
    ];

    // Relationships 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Model events for slug generation
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    // Query scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope for draft posts
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessor for image URL
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/default-post.png');
    }
}
