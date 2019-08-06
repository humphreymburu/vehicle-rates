<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public $timestamps = false;
    public $table = "insurance";

    protected $fillable = ['insurance_cost', 'ins_id'];
}
