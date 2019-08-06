<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CostsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.costs');
    }
}
