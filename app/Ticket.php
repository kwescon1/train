<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    public function customers()
    {
        return $this->belongsTo('App\Customer');;
    }

    public function locations()
    {
        return $this->belongsTo('App\Location');;
    }
}
