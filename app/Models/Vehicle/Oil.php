<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Oil extends Model
{
    
    public $timestamps = false;
    public $table = "oil";

    protected $fillable = ['oil_cost', 'id', 'capacity_id'];
}
