<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $table = 'trains';

    public function trips()
    {
        return $this->belongsTo('App\Trip');;
    }
}
