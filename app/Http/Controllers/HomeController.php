<?php

namespace App\Http\Controllers;

use App\Models\STDBDetailRegister;
use App\Models\STDBRegister;
use Illuminate\Http\Request;

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
        $stdbRegisProcess = STDBRegister::get()->filter(function ($q){
            return $q->latest_status->id==1;
        })->flatten()->count();
        $stdbRegisVerified = STDBRegister::get()->filter(function ($q){
            return $q->latest_status->id==2;
        })->flatten()->count();
        $stdbDetail = STDBDetailRegister::get()->count();
        return view('home',compact('stdbRegis','stdbDetail','stdbRegisProcess','stdbRegisVerified'));
    }
}
