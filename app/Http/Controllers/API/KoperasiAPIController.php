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
        $koperasi = Koperasi::with(['anggota:koperasi_id,id,nama_ktp','anggota.persils:anggota_id,kode_persil,id'])->where('id',$request->koperasi_id)->get()->first();
        return $this->sendResponse($koperasi->toArray(), 'User saved successfully');
    }
}
