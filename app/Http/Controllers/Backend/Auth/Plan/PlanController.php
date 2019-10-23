<?php

namespace App\Http\Controllers\Backend\Auth\Plan;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Auth\User;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanFeature;
use App\Repositories\Backend\Auth\PlanRepository;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;


class PlanController extends Controller
{
     /**
     * @var UserRepository
     */
    protected $planRepository;

    /**
     * PlanController constructor.
     *
     * @param PlanRepository $userRepository
     */
    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
    }


    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.plan.index');
           // ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.plan.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

}
