<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    public $timestamps = false;
    public $table = "interest";

    protected $fillable = ['interest_cost', 'interest_id'];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle\Vehicle');
    }
}
