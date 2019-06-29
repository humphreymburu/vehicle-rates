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
                'category' => $data['category']
            ]);

            // Return the user object
            return $vehicle;
        });
    }

    
}
