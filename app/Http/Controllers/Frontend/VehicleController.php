<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\VehicleRepository;
use App\Http\Requests\Frontend\Vehicle\VehicleRequest;


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
        return view('frontend.vehicle');
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

    






}
