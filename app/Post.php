<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $fillable = ['title', 'content', 'is_active', 'category_id'];
    protected $guarded = ['id'];

    protected $dates = ['deleted_at', 'published_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
        // return $this->belongsToMany('App\Tag');
    }

    public function getUrlAttribute()
    {
        return route('posts.show', $this->slug);
    }

    public function isVisible()
    {
        return $this->attributes['visible'];
    }

}
