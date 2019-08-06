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
use App\Calculations\depreciationCost;

/**
 * Class DepreciationRepository.
 */
class DepreciationRepository extends BaseRepository
{
    
    /**
     * @return string
     */
    public function model()
    {
        return Depreciation::class;
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

        //

    }

    
}
