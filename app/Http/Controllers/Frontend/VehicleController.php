<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\VehicleRepository;
use App\Http\Requests\Frontend\Vehicle\VehicleRequest;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB; 


/**
 * Class HomeController.
 */
class VehicleController extends Controller
{
    
    /**
     * @var VehicleRepository
     */
    protected $vehicleRepository;

    /**
     * VehicleController constructor.
     *
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }
    
    
    
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $capacities = DB::table('capacity')->pluck('engine_cc');

        $tyres = DB::table('tyre_sizes')->pluck("tyre_type","tyre_sizes_id");
        $categories = array("Average Loaded model", "Super Loaded Model");
        $member_cat = DB::table('categories')->pluck("membership_category","category_id");

        return view('frontend.vehicle', compact('tyres', 'categories', 'member_cat', 'capacities'));
    }




        /**
     * @param VehicleRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function post(VehicleRequest $request)
    {
        
        $vehicle = $this->vehicleRepository->create($request->only('purchase_cost', 'category'));
        //return back()->with(['status'=>'Post created successfully']);
        return back()->withInput();
    }

    

    public function getCosts($id) 
    {
        $costs = DB::table("tyre_costs")->where("tyre_sizes_id",$id)->pluck("tyre_cost","id");
        return json_encode($costs);
    }


    public function getSubs($id) 
    {
        $subs = DB::table("subscriptions")->where("cat_id",$id)->pluck("subscription_cost","subscription_id");
        return json_encode($subs);
    }



    public function getCapacity($id) 
    {
        $capacity = DB::table("capacity")->pluck("subscription_cost","subscription_id");
        return json_encode($subs);
    }




}
