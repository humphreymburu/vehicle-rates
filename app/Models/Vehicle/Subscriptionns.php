<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model;

class subscriptionns extends Model
{
    public $timestamps = false;

    public $table = "subscriptions";


    protected $fillable = ['subscription_cost', 'sub_id', 'category' ];
}
