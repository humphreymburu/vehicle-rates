<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Subscription\SubscriptionRequest;
use App\Http\Requests\Frontend\Subscription\SilverRequest;

use App\Http\Requests\Frontend\Subscription\GoldRequest;

use App\Repositories\Frontend\Auth\SubscriptionsRepository;


use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
     /**
     * @var SubscriptionsRepository
     */
    private $subscriptionsRepository;

    public function __construct(SubscriptionsRepository $subscriptionsRepository)
    {
        $this->subscriptionsRepository = $subscriptionsRepository;
    }
    



    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.subscriptions');
    }



    public function yearly(GoldRequest $request)
    {
        $input = $request->input();
        $gold = $request->input('category');
        dd($gold);
       // $user = $this->subscribeRepository->registerUser($input, Plans::$LEVEL1);
       // Auth::login($user);
        
        return view('frontend.costs')->with(compact('gold'));
    }


    public function months(SilverRequest $request)
    {
        $input = $request->input();
        $silver = $request->input('category');
        dd($silver);
       // $user = $this->subscribeRepository->registerUser($input, Plans::$LEVEL1);
       // Auth::login($user);
        
        return view('frontend.costs')->with(compact('silver'));

    }




    public function show(VehicleRequest $request)
    {

        
        //$vehicle = $this->vehicleRepository->create($request->only('purchase_cost', 'category', 'subs'));
       
        $input = $request->input();
        $cost = $request->input('purchase_cost');

        return view('frontend.costs')->with(compact('fixed_cost','operating_costs','parking_cost','liscence_cost','depreciation_amount','interest_total','subscription_cost','insurance_amount','parking_cost','oil_cost','services_cost','repairs_cost','tyres_cost','drive', 'fuel', 'fixed_costs_km', 'running_cost'));
    }

    
   

}

