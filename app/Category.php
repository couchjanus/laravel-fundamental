<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    // Таблица, связанная с моделью.
    protected $table = 'categories';

    // Атрибуты, для которых разрешено массовое назначение.

    protected $fillable = ['name', 'description'];

    // Атрибуты, которые должны быть преобразованы в даты.
   
    protected $dates = ['deleted_at'];


    // Атрибуты, для которых запрещено массовое назначение.
    // protected $guarded = ['description'];

    // Атрибуты, для которых запрещено массовое назначение.
    // protected $guarded = [];

    // Вы также можете запретить массовое заполнение всем атрибутам, используя символ *:
    // protected $guarded = ['*'];


    // Определяет необходимость отметок времени для модели.
    // public $timestamps = false;

    // Формат хранения отметок времени модели.
    // public $dateFormat = "U";
    // public $dateFormat = 'd.m.Y';
    // Для настройки формата времени перекройте метод getDateFormat():

    // public function getCreatedAtDateAttribute()
    // {
    //   return $this->created_at->format('d.m.Y');
    // }

    /**
   * Get the format for database stored dates.
   *
   * @return string
   */
    // public function getDateFormat()
    // {
    //     return 'Y-m-d H:i:s';
    // }


    // Carbon instance uses this format as default so if you need to get Carbon date - just simply use Carbon::parse($value) - it will sure recognize this type of format. And by default doing (string)Carbon::parse($value) you will get date in this default format cause:

    /**
     * Format to use for __toString method when type juggling occurs.
     *
     * @var string
     */
    // protected static $toStringFormat = self::DEFAULT_TO_STRING_FORMAT;

    /**
     * Format the instance as a string using the set format
     *
     * @return string
     */
    // public function __toString()
    // {
    //     return $this->format(static::$toStringFormat);
    // }
    // Also check Carbon documentation - there are a lot of modifiers like ->toDateString(), ->toDateTimeString()

    // public function getCreatedAtAttribute($value)
    // {
    //     $date = new DateTime($value);
    //     $date->format('Y-m-d H:i:s');
    //     return $date;
    //
    // }


    // echo $model->created_at->format('U')  is one way, or if you want to set a default format to be used when casting created_to to a string you can look here: https://github.com/briannesbitt/Carbon#api-formatting

    public function getDateFormat()
    {
        // return "U";
        return 'd.m.Y';
    }

}
