<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\User;
use App\Models\Vehicle\Plans;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanFeature;
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



/**
 * Class UserRepository.
 */
class PlanRepository extends BaseRepository
{
      
    
    /**
     * @return string
     */
    public function model()
    {
        return Plan::class;
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
          
            $plan = app('rinvex.subscriptions.plan')->create([
                'name' => 'Silver',
                'description' => 'Pro plan',
                'price' => 500,
                'signup_fee' => 0,
                'invoice_period' => 5,
                'invoice_interval' => 'month',
                'trial_period' => 1,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'KSH',
            ]);

            $plan1 = app('rinvex.subscriptions.plan')->create([
                'name' => 'Gold',
                'description' => 'Pro plan',
                'price' => 1000,
                'signup_fee' => 0,
                'invoice_period' => 12,
                'invoice_interval' => 'month',
                'trial_period' => 1,
                'trial_interval' => 'day',
                'sort_order' => 1,
                'currency' => 'KSH',
            ]);
            
            
          
    
        });




        

          
         
   


    }

    
}
