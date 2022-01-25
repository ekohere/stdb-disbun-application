<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//API route for login user
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('get_polygon/{id}',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class,'getPolygonByIdRegister']);
Route::get('get_polygon_persil/{id}',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class,'getPolygonPersilById']);
Route::get('get_polygon_clean_rtrw/{id}',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class,'ccRTRW']);
Route::get('get_polygon_clean_apl/{id}',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class, 'ccAPL']);
Route::get('rtrw_perkebunan',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class,'getPolygonPerkebunan']);
Route::get('apl_perkebunan',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class,'getPolygonAPL']);

//=============testing api disini
//Route::get('testing_clear_clean',[\App\Http\Controllers\API\STDBDetailRegisterAPIController::class,'ccRTRW']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('token_device',[AuthController::class,'storeTokenDevice']);

    Route::get('my_koperasi',[\App\Http\Controllers\API\KoperasiAPIController::class,'index']);
    Route::get('my_data',[\App\Http\Controllers\API\AuthController::class,'syncDataAnggotaPersil']);

    Route::resource('stdb_registers', App\Http\Controllers\API\STDBRegisterAPIController::class);
    Route::get('stdb_mapping_history', [App\Http\Controllers\API\STDBRegisterAPIController::class,'riwayatMappingOperatorKoperasi']);
    Route::post('stdb_regis_koperasi',[\App\Http\Controllers\API\STDBRegisterAPIController::class,'storeByKoperasi']);
    Route::post('stdb_regis_nonkop',[\App\Http\Controllers\API\STDBRegisterAPIController::class,'storeByNonKoperasi']);
    Route::resource('stdb_profiles', App\Http\Controllers\API\STDBProfileAPIController::class);
    Route::resource('stdb_statuses', App\Http\Controllers\API\STDBStatusAPIController::class);
    Route::resource('stdb_persils', App\Http\Controllers\API\STDBPersilAPIController::class);
    Route::resource('stdb_detail_registers', App\Http\Controllers\API\STDBDetailRegisterAPIController::class);
    Route::resource('stdb_register_statuses', App\Http\Controllers\API\STDBRegisterHasSTDBStatusAPIController::class);

    Route::get('/profile', function(Request $request) { return auth()->user()->load('koperasi'); });
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});


Route::resource('desas', App\Http\Controllers\API\DesaAPIController::class);
