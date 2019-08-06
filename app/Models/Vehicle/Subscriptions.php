<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class subscriptions extends Model
{
    public $timestamps = false;


    protected $fillable = ['subscription_cost', 'sub_id' ];
}
