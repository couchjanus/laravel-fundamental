<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';
    
    // Можно использовать другой способ обновить значение 
    // timestamps created_at и updated_at:

    public function setUpdatedAt($value)
    {
        return null;
    }


    public function setCreatedAt($value)
    {
        return null;
    }

}
