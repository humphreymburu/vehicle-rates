<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use DB;



class TyreController extends Controller
{

    public function getTyreSizes()
        {
         $countries = DB::table('tyre_sizes')->pluck("tyre_type","tyre_sizes_id");
         return view('dropdown',compact('tyre_sizes'));
    }

}    