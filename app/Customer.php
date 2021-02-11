<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    
}
