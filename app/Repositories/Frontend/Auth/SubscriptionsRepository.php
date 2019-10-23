<?php

namespace App\Repositories\Frontend\Auth;

use App\Models\Auth\User;
use App\Models\Vehicle\Subscriptions;
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
use App\Calculations\depreciationCost;
use App\Calculations\interestCost;
use App\Calculations\insuranceCost;


/**
 * Class SubscriptionsRepository.
 */
class SubscriptionsRepository extends BaseRepository
{
    
    /**
     * @return string
     */
    public function model()
    {
        return Subscriptions::class;
    }



    private function existingUser($input, $level, $charge)
    {
        /** @var \App\User $user */
        if($user = User::where("email", $input['stripeEmail'])->first()) {
            if($user->subscribed()) {
                $user = $this->chargeOrSwap($user, $charge, $level);
            } else {
                $user = $this->chargeOrSubscribe($user, $charge, $level, $input);
            }
            return $user;
        }
        return false;
    }


    private function createNewCustomer($input, $level, $charge)
    {
        $user = User::create(
            [
                'email' => $input['stripeEmail'],
                'password' => Hash::make(Str::random())
            ]
        );
        $user = $this->chargeOrSubscribe($user, $charge, $level, $input);
        return $user;
    }


    private function chargeOrSubscribe($user, $charge, $level, $input)
    {
        if($charge) {
            $user->charge($level);
        } else {
            $subscription = $user->newSubscription($level, $level);
            $subscription->create($input['stripeToken']);
        }
        return $user;
    }


    public function swap($current, $new_plan = false)
    {
        
        if($new_plan == false) {
            $new_plan = $this->getNewPlanFromCurrent($current);
        }
        
        $user = Auth::user();
        /** @var \App\User $user */
        $subscription = $user->subscription($current);
        return $subscription->swap($new_plan);
    }


    public function getNewPlanFromCurrent($current)
    {
        if($current == Plans::$LEVEL1) {
            return Plans::$LEVEL2;
        }
        
        return Plans::$LEVEL1;
    }



    
    /**
     * @param $user \App\User
     * @param $charge
     * @param $level
     * @return mixed
     */
    private function chargeOrSwap($user, $charge, $level)
    {
        if($charge)
        {
            $user->charge($level);
        } else {
            /**
             * @TODO fix this so we go from to on $level
             */
            $user->subscription($level)->swap($level);
        }
        return $user;
    }


    
}
