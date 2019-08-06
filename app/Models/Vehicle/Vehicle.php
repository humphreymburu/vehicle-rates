<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;


class Vehicle extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['purchase_cost', 'category', 'sub_id' ];


    public function depreciation()
    {
        return $this->hasOne('App\Models\Vehicle\Depreciation');
    }


    public function interest()
    {
        return $this->hasOne('App\Models\Vehicle\Interest');
    }


}
