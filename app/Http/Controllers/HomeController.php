<?php

namespace App\Http\Controllers;

use App\Models\STDBDetailRegister;
use App\Models\STDBRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stdbRegis = STDBRegister::get()->count();
        if (Auth::user()->hasRole('KPH')){
            $stdbRegisProcess = STDBRegister::where('verified_by_kph',0)->get()->count();
            $stdbRegisVerified = STDBRegister::where('verified_by_kph',1)->get()->count();
        }else if (Auth::user()->hasRole('PPR')){
            $stdbRegisProcess = STDBRegister::where('verified_by_ppr',0)->get()->count();
            $stdbRegisVerified = STDBRegister::where('verified_by_ppr',1)->get()->count();
        }else{
            $stdbRegisProcess = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();
            $stdbRegisVerified = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();
        }

        $stdbDetail = STDBDetailRegister::get()->count();
        return view('home',compact('stdbRegis','stdbDetail','stdbRegisProcess','stdbRegisVerified'));
    }
}
