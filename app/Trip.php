<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function train()
    {
        return $this->belongsTo('App\Train');
    }

    public function departure()
    {
        return $this->belongsTo('App\Location', 'departurelocation_id');
    }

    public function arrival()
    {
        return $this->belongsTo('App\Location', 'arrivallocation_id');
    }
   
}
