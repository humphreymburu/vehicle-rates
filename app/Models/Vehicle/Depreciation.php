<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Depreciation extends Model
{
    public $timestamps = false;
    public $table = "depreciation";

    protected $fillable = ['depreciation_cost', 'dep_id'];
   
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle\Vehicle');
    }
}
