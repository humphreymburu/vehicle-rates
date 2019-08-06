<?php

namespace App\Repositories\Frontend\Auth;

use App\Models\Auth\User;
use App\Models\Vehicle\Vehicle;
use Illuminate\Http\UploadedFile;
use App\Models\Auth\SocialAccount;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Events\Frontend\Auth\UserConfirmed;
use App\Events\Frontend\Auth\UserProviderRegistered;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Models\Vehicle\Depreciation;
use App\Models\Vehicle\Interest;
use App\Models\Vehicle\Insurance;
use App\Models\Vehicle\Subscriptions;
use App\Calculations\depreciationCost;
use App\Calculations\interestCost;
use App\Calculations\insuranceCost;


/**
 * Class UserRepository.
 */
class VehicleRepository extends BaseRepository
{
      
    
    /**
     * @return string
     */
    public function model()
    {
        return Vehicle::class;
    }


    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $vehicle = parent::create([
                'purchase_cost' => $data['purchase_cost'],
                'category' => $data['category'],
            ]);
    
            $depreciation = new depreciationCost($data['purchase_cost']);
            $depreciation_amount = $depreciation->depreciateCalc();
//dd($depreciation_amount);

             $dep_id = $vehicle->id;

            $depreciate = Depreciation::create([
                'depreciation_cost' => $depreciation_amount,
                'dep_id' => $dep_id,
            ]);

            $carInterest = new interestCost($data['purchase_cost']);
            $interest_amount = $carInterest->interestCalc();
            $hire_amount = $carInterest->hirePurchase();


            $interest_total = $interest_amount + $hire_amount;
            
            $interest = Interest::create([
                'interest_cost' => $interest_total,
                'interest_id' => $dep_id,
            ]);


           //  dd($interest);

           $carInsurance = new insuranceCost($data['purchase_cost']);
           $insurance_amount = $carInsurance->insuranceCalc();
            

            $insurance = Insurance::create([
                'insurance_cost' => $insurance_amount,
                'ins_id' => $dep_id,
            ]);

            $insurance = Insurance::create([
                'insurance_cost' => $insurance_amount,
                'ins_id' => $dep_id,
            ]);
            

            $subscription = Subscriptions::create([
                'subscription_cost' =>  $data['subs'],
                'sub_id' => $dep_id,
            ]);




    
        });




        

          
         
   


    }

    
}
