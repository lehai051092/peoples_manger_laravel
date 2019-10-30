<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';

    public function region() {
        return $this->belongsTo('App\Region');
    }
}
