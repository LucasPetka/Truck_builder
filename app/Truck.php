<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Truck_Brand;

class Truck extends Model
{
    protected $table = 'trucks';

    protected $fillable = ['brand','year_made','full_name', 'owner_count', 'comment'];

    public $timestamps = false;

    function brandName() {
        return $this->belongsTo('App\Truck_Brand', 'brand', 'id');
    }
}
