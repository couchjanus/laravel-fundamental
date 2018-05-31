<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;

use App\Traits\UpdateGenericClass;




class Tag extends Model
{
    use Sluggable;
    use UpdateGenericClass;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Все привязанные отношения.
     *
     * @var array
    */
    protected $touches = ['posts'];


    public function posts()
    {
        // return $this->belongsToMany(Post::class);
        return $this->belongsToMany('App\Post');
    }

    public function getUrlAttribute()
    {
        return route('tags.show', $this->slug);
    }
}
