<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\VehicleRepository;
use App\Repositories\Frontend\Auth\DepreciationRepository;
use App\Http\Requests\Frontend\Vehicle\VehicleRequest;
use App\Calculations\depreciationCost;
use App\Calculations\interestCost;
use App\Calculations\insuranceCost;
use App\Calculations\runningCost;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB; 


/**
 * Class HomeController.
 */
class VehicleController extends Controller
{
    
    /**
     * @var depreciationCost
     */
    protected $depreciationCost;


      /**
     * @var interestCost
     */
    protected $interestCost;



     /**
     * @var insuranceCost
     */
    protected $insuranceCost;


     /**
     * @var fuel_costs;
     */
    protected $runningCost;


    /**
     * VehicleController constructor.
     *
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct() 
    {
        //$this->depreciationCost = $depreciationCost;
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

    
        $vehicle = $this->vehicleRepository->create($request->only('purchase_cost','category','subs'));
        //return back()->with(['status'=>'Post created successfully']);
    
       // $depreciation = $this->vehicleRepository->create($request->only('depreciation_cost'));
    
       // return back()->withInput();
        //return redirect()->route('frontend.costs');

      

        $input = $request->input();


        return view('frontend.costs')->with();


        //return view('frontend.costs', compact('formData'));

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

    
    public function getDrives(Request $request)
    {
        $drives = DB::table("operations")->where("capacity_id",$request->id)->pluck("drive","id");
       return json_encode($drives);
    }

    public function getServices(Request $request)
    {
        $services = DB::table("operations")->where("id",$request->id)->pluck("services_cost","id");
        return json_encode($services);
    }


    public function getRepairs($id)
    {
        $repairs = DB::table("operations")->where("capacity_id",$id)->pluck("repair_cost","id");
        return json_encode($repairs);
    }

    public function getTyres(Request $request)
    {
        $tyres = DB::table("operations")->where("id",$request->id)->pluck("tyre_cost","id");
        return json_encode($tyres);
    }


    public function getFuels($id)
    {
        $fuel_id = DB::table("operations")->where("id",$id)->pluck("fuel_id","id");
        $fuel_cost = DB::table("fuel")->where("id",$fuel_id)->pluck("fuel_cost","id");



        foreach ($fuel_cost as $i => $value) {
            $fuel_price = $value;
        }

        return $fuel_price;
    }

    public function getDistance($id)
    {
        $distance_id = DB::table("capacity")->where("id",$id)->pluck("distance","id");

        foreach ($distance_id as $i => $value) {
            $distance = $value;
        }

        return $distance;
    }


    




    public function getOperating($id) {
       
    $results = DB::table('operations')
    ->where('id', Auth::user()->id)
    ->if($request->capacity_id, 'capacity_id', '=', $request->capacity_id)
    ->get();

    return $results;
    }


    
    
    public function show(VehicleRequest $request)
    {

        
        //$vehicle = $this->vehicleRepository->create($request->only('purchase_cost', 'category', 'subs'));
       
        $input = $request->input();
        $cost = $request->input('purchase_cost');


    
        // depreciation
        $depreciation = new depreciationCost($cost);
        $depreciation_amount = $depreciation->depreciateCalc();


        // interest 
        $carInterest = new interestCost($cost);
        $interest_amount = $carInterest->interestCalc();
        $hire_amount = $carInterest->hirePurchase();

         // interest total
        $interest_total = $interest_amount + $hire_amount;


        $carInsurance = new insuranceCost($cost);
        $insurance_amount = $carInsurance->insuranceCalc();

        
        $cat = $request->input('category');

        //subscription
        $subscription_cost =$request->input('subs');


        //parking default
        $parking_cost = 93500;

        //liscence default
        $liscence_cost = 0;
        //dd($liscence_cost);

        $fixed_cost = $liscence_cost +  $parking_cost + $subscription_cost + $insurance_amount + $interest_total + $depreciation_amount;
        


        //fixed cost per km
        $fixed_costs_km = round ($fixed_cost / 30000, 2);
      
        

        
    
        //Operating Cost

        $oil_cost = $request->input('oils');
        $drive = $request->input('oils');
        $services_cost = $request->input('services');
        $repairs_cost = $request->input('repairs');
        $tyres_cost = $request->input('tyres');
        

        //get distance and fuel price
        $capacity_id = $request->input('capacity');
        $fuel_worth = $this->getFuels($capacity_id);
        $distance = $this->getDistance($capacity_id);
      

        $fuel_cost = new runningCost($fuel_worth, $distance,);
        $fuel = $fuel_cost->fuelCalc();


    
        $operating_costs = $oil_cost + $services_cost + $repairs_cost + $tyres_cost + $fuel;

       
        //Total Running Cost per KM

        
        $running_cost = $fixed_costs_km + $operating_costs;

        
        
        
        return view('frontend.costs')->with(compact('fixed_cost','operating_costs','parking_cost','liscence_cost','depreciation_amount','interest_total','subscription_cost','insurance_amount','parking_cost','oil_cost','services_cost','repairs_cost','tyres_cost','drive', 'fuel', 'fixed_costs_km', 'running_cost'));
    }





}
