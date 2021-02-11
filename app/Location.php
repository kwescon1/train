<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    public function tickets()
    {
        return $this->belongsTo('App\Ticket');;
    }
}
