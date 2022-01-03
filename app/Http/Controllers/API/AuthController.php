<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Koperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Mockery\Exception;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        if ($user->koperasi_id!==null){
            $user = User::with(['koperasi.anggota:koperasi_id,id,nama_ktp','koperasi.anggota.persils:anggota_id,kode_persil,id'])->where('email',$request['email'])->get()->first();
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $url = env('APP_URL').'/detail_koperasi/'.$user->koperasi_id;
        return response()
            ->json([
                'message' => 'Hi '.$user->name.', welcome to home',
                'user' => $user,
                'access_token' => $token, 'token_type' => 'Bearer',
                'link_detail_koperasi' => $url
            ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    public function storeTokenDevice(Request $request)
    {
        $input = $request->only('token_device');

        try {
            DB::beginTransaction();

            $users= \Illuminate\Support\Facades\Auth::user();
            $users->token_device=$input['token_device'];
            $users->save();

            DB::commit();
            return $this->sendResponse($users->toArray(), 'User saved successfully');
        }catch (Exception $e){
            DB::rollBack();
            return $this->sendError($e->getMessage());
        }
    }
}
