<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Response;
use DB;
use Spatie\Permission\Models\Role;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware(['auth']);
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = Cache::remember("list_user_all", 10 * 60, function () {
            return $this->userRepository->all();
        });

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $sRoles=Role::orderBy('name')->get();
        $roles=[];
        return view('users.create',compact('roles','sRoles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $roles=[];
        if($request->has('s_role_id')){
            $roles=$input['s_role_id'];
        }

        DB::transaction(function () use($input,$roles) {

            $role = Auth::user()->getRoleNames()->first();

            $user = $this->userRepository->create($input);

            if (isset($input['nama'])) {
                if($role != 'ROOT' || $role != 'ADM') {
                    $unit['parent_unit_id']= Auth::user()['unit']->id;
                    $unit['instansi_id']= null;
                }

                $unit['unit_type_id'] = $input['unit_type_id'];
                $unit['nama'] = $input['nama'];
                Unit::fixTree();
                $saveUnit = Unit::create($unit);
                $user->unit_id = $saveUnit->id;
            }

            $user->syncRoles($roles);
            $user->password = bcrypt($input['password']);
            $user->username = str_replace(" ", "_", $input['username']);
            $user->save();
        },3);

//        Flash::success('User saved successfully.');

        Flash::success('Tambah Akun Berhasil dilakukan');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('users.index'));
        }
        $sRoles=Role::orderBy('name')->get();
        $roles=$user->roles->pluck('id')->toArray();

        return view('users.edit',compact('roles','sRoles'))->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $role = Auth::user()->getRoleNames()->first();
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('users.index'));
        }

        $input=$request->all();

        if($input['password']==='' || $input['password']===null){
            unset($input['password']);
        }

        $roles=[];
        if($request->has('s_role_id')){
            $roles=$input['s_role_id'];
        }

        DB::transaction(function () use($input,$roles,$id,$request){
            $user = $this->userRepository->update($input, $id);
            $user->username = str_replace(" ", "_", $input['username']);
            $user->syncRoles($roles);

            if(isset($input['password'])){
                $user->password = bcrypt($input['password']);
            }
            $user->save();
        },3);


        Flash::success('Updated successfully');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
//            Flash::error('User not found');
            toastr('User not found','warning','Info');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Deleted successfully');

        return redirect(route('users.index'));
    }
    public function profil() {
        $user = User::where('id',Auth::user()['id'])->first();
        return view('users/profil/profil',compact('user'));
    }

    public function editProfiles($id) {
        $user = $this->userRepository->find($id);
        return view('users.profil.edit',compact('user'));
    }

    public function updateProfile($id, UpdateUserRequest $request) {
        $user = $this->userRepository->find($id);

        $input=$request->except('foto');

        if($input['current_password']==='' || $input['current_password']===null){
            unset($input['password']);
        }

        DB::transaction(function () use($input,$id,$request){
            $date = $date = Carbon::now()->format('dmY_His');
            $user = $this->userRepository->update($input, $id);
            $user->username = str_replace(" ", "_", $input['username']);

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $user->username.'_'.'fotoProfil.'.$file->getClientOriginalExtension();
                $path = $request['foto']->storeAs('public/fotoProfil', $filename, 'local');
                $user->foto = 'storage' . substr($path, strpos($path, '/'));
            }

            if(isset($input['current_password'])){
                if (!(Hash::check($input['current_password'], Auth::user()->password))) {
                    unset($input['password']);
                    alert('Opps!','Sepertinya bukan kata sandi anda.','warning');
                } else {
                    $user->password = bcrypt($input['password']);
                    $user->save();
                    alert('Berhasil','Pembaruan Data Successfully','success');
                }
            } else {
                unset($input['password']);
                $user->save();
                toastr('Pembaruan Data Successfully','success','Updated');
            }
        },2);

        return redirect(url('profil'));
    }
}
