<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Desa;
use App\Models\KPH;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $q->whereIn('id',[7,8,9,11]);
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
        $kph = KPH::pluck('nama','id');
        $roles = Role::whereIn('name',['KPH','PPR','koordinator','BPN'])->pluck('name','id');
        return view('users.create',compact('desa','roles','kph'));
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
        $input['koperasi_id'] = 0;
        $input['kode_koperasi'] = "KOP-0";
        $input['verified'] = 1;
        try{
            DB::beginTransaction();
            $user = User::create($input);
            $user->password = bcrypt($input['password']);
            $user->assignRole($input['role_id']);
            //Upload Foto dan simpan path/url foto ke dalam database
            if( $request->hasFile('avatar')){
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
        $kph = KPH::pluck('nama','id');
        $roles = Role::whereIn('name',['KPH','PPR','koordinator','BPN'])->pluck('name','id');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit',compact('desa','kph','roles'))->with('user', $user);
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

    public function profil()
    {
        $user = User::find(Auth::id());
        $desa = Desa::all();
        return view('users.profil.profil',compact('desa','user'));
    }

    public function editProfiles($id) {
        $user = User::find($id);
        return view('users.profil.edit',compact('user'));
    }

    public function updateProfile($id, Request $request)
    {
        $user = User::find($id);
        $input=$request->except('avatar');
        if($input['current_password']==='' || $input['current_password']===null){
            unset($input['password']);
        } else {
            if (!(Hash::check($input['current_password'], Auth::user()->password))) {
                unset($input['password']);
            }
        }
        $user->update($input);
        $user->save();

        if( $request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = $user->id.'imgAvatar.'.$file->getClientOriginalExtension();
            $path=$request->avatar->storeAs('public/userAvatar', $filename,'local');
            $user->avatar='storage'.substr($path,strpos($path,'/'));
        }

        if(isset($input['current_password'])){
            if (!(Hash::check($input['current_password'], Auth::user()->password))) {
                Flash::error('Opps!','Sepertinya bukan kata sandi anda.','warning');
            } else {
                $user->password = bcrypt($input['password']);
                $user->save();
                Flash::success('Berhasil','Pembaruan Data Successfully','success');
            }
        } else {
            unset($input['password']);
            $user->save();
            Flash::success('Pembaruan Data Successfully','success','Updated');
        }

        return redirect(url('profil'));
    }
}
