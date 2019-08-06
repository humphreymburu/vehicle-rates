<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    //
    public $timestamps = false;
    public $table = "fuel";

    protected $fillable = ['fuel_type'];
}
