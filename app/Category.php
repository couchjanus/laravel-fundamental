<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\UpdateGenericClass;

class Category extends Model
{
    use SoftDeletes;
    use Sluggable;
    use UpdateGenericClass;
    // Таблица, связанная с моделью.
    protected $table = 'categories';

    // Атрибуты, для которых разрешено массовое назначение.

    protected $fillable = ['name', 'description'];

    // Атрибуты, которые должны быть преобразованы в даты.

    protected $dates = ['deleted_at'];

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

    // Атрибуты, для которых запрещено массовое назначение.
    // protected $guarded = ['description'];

    // Атрибуты, для которых запрещено массовое назначение.
    // protected $guarded = [];

    // Вы также можете запретить массовое заполнение всем атрибутам, используя символ *:
    // protected $guarded = ['*'];



    public function getDateFormat()
    {
        // return "U";
        return 'd.m.Y';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getUrlAttribute()
    {
        return route('categories.show', $this->slug);
    }

}
