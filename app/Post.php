<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public static function allPosts()
    {
        /** @var Pipeline $pipeline */
        $pipeline = app(Pipeline::class);
        return $pipeline->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\MaxCount::class
            ])
            ->thenReturn()
            ->paginate(5);
    }


    public function format()
    {
        return [
            'post_id' => $this->id,
            'title' => Str::upper($this->title),
            'created_by' => 'Muhsen Maqsudi',
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
