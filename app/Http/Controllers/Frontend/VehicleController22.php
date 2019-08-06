<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\VehicleRepository;
use App\Repositories\Frontend\Auth\DepreciationRepository;
use App\Http\Requests\Frontend\Vehicle\VehicleRequest;
use App\Calculations\depreciationCost;
use App\Calculations\interestCost;
use App\Calculations\insuranceCost;

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
     * @var VehicleRepository
     */
    protected $depreciationRepository;



    /**
     * VehicleController constructor.
     *
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(VehicleRepository $vehicleRepository, DepreciationRepository $depreciationRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
       // $this->depreciationRepository = $depreciationRepository;
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

        
        $vehicle = $this->vehicleRepository->create($request->only('purchase_cost', 'category', 'subs'));
        //return back()->with(['status'=>'Post created successfully']);
    
       // $depreciation = $this->vehicleRepository->create($request->only('depreciation_cost'));
    
       // return back()->withInput();
        //return redirect()->route('frontend.costs');

      

        $input = $request->input();
dd($input);

        return view('frontend.costs')->with();


        //return view('frontend.costs', compact('formData'));

    }


    public function show(VehicleRequest $request)
    {

        
        $vehicle = $this->vehicleRepository->create($request->only('purchase_cost', 'category', 'subs'));
       

  


        $input = $request->input();

        



        $cost = $request->input('purchase_cost');
        $cat = $request->input('category');
        
        return view('frontend.costs')->with(compact('cat', 'cost'));
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
        return json_encode($capacity);
    }


    public function getOils($id) 
    {
        $oils = DB::table("oil")->where("capacity_id",$id)->pluck("oil_cost","id");
        return json_encode($oils);
    }

    
    public function getDrives($id)
    {
        $drives = DB::table("operations")->where("capacity_id",$id)->pluck("drive","id");
        return json_encode($drives);
    }



    public function getServices($id)
    {
        $services = DB::table("operations")->where("capacity_id",$id)->pluck("services_cost","id");
        return json_encode($services);
    }


    public function getRepairs($id)
    {
        $repairs = DB::table("operations")->where("capacity_id",$id)->pluck("repair_cost","id");
        return json_encode($repairs);
    }

    public function getTyres($id)
    {
        $tyres = DB::table("operations")->where("capacity_id",$id)->pluck("tyre_cost","id");
        return json_encode($tyres);
    }
   


    






}
