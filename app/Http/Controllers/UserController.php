<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Desa;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;
use Spatie\Permission\Models\Role;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
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
        $users = User::whereHas('roles',function ($q) {
            $q->whereIn('id',[7,8,9]);
        })->get();
        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $desa = Desa::pluck('nama_desa','id');
        $sRoles=Role::whereIn('name',['KPH','PPR','koordinator'])->get();
        $roles=[];
        return view('users.create',compact('desa','sRoles','roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->except('avatar');
        $input['kode_koperasi'] = 0;
        $roles=[];
        if($request->has('s_role_id')){
            $roles=$input['s_role_id'];
        }
        $input['verified'] = 1;
        try{
            DB::beginTransaction();
            $user = User::create($input);
            $user->password = bcrypt($input['password']);
            $user->role_id = $roles[0];
            $user->syncRoles($roles);
            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = $user->id.'imgAvatar.'.$file->getClientOriginalExtension();
                $path=$request->avatar->storeAs('public/userAvatar', $filename,'local');
                $user->avatar='storage'.substr($path,strpos($path,'/'));
            }
            $user->save();
            DB::commit();
            Flash::success('User saved successfully.');
        }catch (\Exception $exception){
            DB::rollBack();
            Flash::error('User failed to save. Error:'.$exception->getMessage());

        }
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
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
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
        $desa = Desa::pluck('nama_desa','id');
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit',compact('desa'))->with('user', $user);
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
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
