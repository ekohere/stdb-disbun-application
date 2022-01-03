<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Koperasi;
use Illuminate\Http\Request;

class KoperasiAPIController extends AppBaseController
{
    public function index(Request $request)
    {
        $koperasi = Koperasi::with(['anggota','anggota.persil'])->where('id',$request->koperasi_id)->get();
        return $this->sendResponse($koperasi->toArray(), 'User saved successfully');
    }
}
