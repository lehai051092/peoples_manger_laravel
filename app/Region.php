<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function peoples() {
        return $this->hasMany('App\People');
    }
}
