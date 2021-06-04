<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'model',
        'kw',
        'brand_id',
    ];

    public function brand() {
        return $this -> belongsTo('App\Brand');
    }

    public function pilots() {
        return $this -> belongsToMany('App\Pilot');
    }
}