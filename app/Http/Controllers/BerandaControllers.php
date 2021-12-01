<?php

namespace App\Http\Controllers;

use App\Statics\ProfilStatic;
use Illuminate\Http\Request;

/**
 * @property ProfilStatic profileStatic
 */
class BerandaControllers extends Controller
{
    public function index() {
        return view('welcome');
    }
}
