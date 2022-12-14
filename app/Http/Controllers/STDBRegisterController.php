<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBRegisterRequest;
use App\Http\Requests\UpdateSTDBRegisterRequest;
use App\Models\KphHasKecamatan;
use App\Models\STDBRegister;
use App\Models\STDBRegisterHasSTDBStatus;
use App\Repositories\STDBRegisterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;
use Response;

class STDBRegisterController extends AppBaseController
{
    /** @var  STDBRegisterRepository */
    private $sTDBRegisterRepository;

    public function __construct(STDBRegisterRepository $sTDBRegisterRepo)
    {
        $this->sTDBRegisterRepository = $sTDBRegisterRepo;
    }

    /**
     * Display a listing of the STDBRegister.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('KPH')){
            $kecKPH = KphHasKecamatan::where('kph_id', Auth::user()->kph_id)->join('kecamatan','kph_has_kecamatan.kecamatan_id','=','kecamatan.id')->get();
            $kecamatan=[];
            foreach ($kecKPH as $item){
                array_push($kecamatan,$item->kecamatan->kode_kec);
            }
            $sTDBRegisters = STDBRegister::where('verified_by_kph',0)->get();
        }
        elseif (Auth::user()->hasRole('PPR')){
            $sTDBRegisters = STDBRegister::where('verified_by_ppr',0)->get();
        }
        elseif (Auth::user()->hasRole('admin') || Auth::user()->hasRole('admin_disbun')){
            $sTDBRegisters = STDBRegister::get()->filter(function ($q){
                    return $q->latest_status->id != 2 && $q->latest_status->id != 3;
                })->flatten();
        }
        elseif (Auth::user()->hasRole('BPN')){
            $sTDBRegisters = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id != 2 && $q->latest_status->id != 3 && $q->latest_status->id != 6;
            })->flatten();
        }
        return view('s_t_d_b_registers.index')
            ->with('sTDBRegisters', $sTDBRegisters);
    }

    /**
     * Show the form for creating a new STDBRegister.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_registers.create');
    }

    /**
     * Store a newly created STDBRegister in storage.
     *
     * @param CreateSTDBRegisterRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBRegisterRequest $request)
    {
        $input = $request->all();

        $sTDBRegister = $this->sTDBRegisterRepository->create($input);

        Flash::success('S T D B Register saved successfully.');

        return redirect(route('sTDBRegisters.index'));
    }

    /**
     * Display the specified STDBRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);
        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');
            return redirect(route('sTDBRegisters.index'));
        }
        return view('s_t_d_b_registers.show')->with('sTDBRegister', $sTDBRegister);
    }

    /**
     * Show the form for editing the specified STDBRegister.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');

            return redirect(route('sTDBRegisters.index'));
        }

        return view('s_t_d_b_registers.edit')->with('sTDBRegister', $sTDBRegister);
    }

    /**
     * Update the specified STDBRegister in storage.
     *
     * @param int $id
     * @param UpdateSTDBRegisterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBRegisterRequest $request)
    {

        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            Flash::error('STDB Register not found');
            return redirect(route('sTDBRegisters.index'));
        }
        $sTDBRegister = $this->sTDBRegisterRepository->update($request->all(), $id);
        Flash::success('S T D B Register updated successfully.');
        return redirect(route('sTDBRegisters.index'));
    }

    /**
     * Remove the specified STDBRegister from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            Flash::error('S T D B Register not found');

            return redirect(route('sTDBRegisters.index'));
        }

        $this->sTDBRegisterRepository->delete($id);

        Flash::success('S T D B Register deleted successfully.');

        return redirect(route('sTDBRegisters.index'));
    }

    public function getVerify($id)
    {
        $sTDBRegister = STDBRegister::find($id);
        return view('s_t_d_b_registers.verify_form',compact('sTDBRegister'));
    }

    public function verified(Request $request)
    {
        $input = $request->except('lampiran_peta_persil');
        try{
            DB::beginTransaction();
            $stdbRegister = STDBRegister::find($input['stdb_register_id']);
            if (isset($request->lampiran_peta_persil)){
                $stdbRegister->addFromMediaLibraryRequest($request->lampiran_peta_persil)
                    ->toMediaCollection('lampiran_peta_persil');
            }
            $stdbRegister->update($input);
            $stdbRegister->save();

            $input['users_id'] = Auth::id();
            $stdbStatus = STDBRegisterHasSTDBStatus::create($input);
            $stdbStatus->save();
            DB::commit();

            Flash::success('STDB Register verified successfully.');
            return redirect(route('sTDBRegisters.index'));
        }catch (\Exception $exception){
            DB::rollBack();
            Flash::error('STDB Register verified failed. error:'.$exception->getMessage());
            return redirect(route('sTDBRegisters.index'));
        }
    }

    public function cetakSTDB($id)
    {
        $sTDBRegister = STDBRegister::find($id);
        switch (date_format($sTDBRegister->latest_status->pivot->created_at,'m')){
            case 1:
                $bulan="I";
                break;
            case 2:
                $bulan= "II";
                break;
            case 3:
                $bulan= "III";
                break;
            case 4:
                $bulan= "IV";
                break;
            case 5:
                $bulan= "V";
                break;
            case 6:
                $bulan= "VI";
                break;
            case 7:
                $bulan= "VII";
                break;
            case 8:
                $bulan= "VIII";
                break;
            case 9:
                $bulan= "IX";
                break;
            case 10:
                $bulan= "X";
                break;
            case 11:
                $bulan= "XI";
                break;
            case 12:
                $bulan= "XII";
                break;
        }
        foreach ($sTDBRegister->stdbDetailRegis as $item){
            $idPolygon = $item->persil->polygon_persil_id;
            if (!empty($item->persil->polygonPersil->geom)){
                $metry = $item->persil->polygonPersil->geom;
                $center = DB::connection('pgsql')->select(DB::raw("select ST_X(ST_AsText(ST_Centroid('polygon($metry)',true))) as x, ST_Y(ST_AsText(ST_Centroid('polygon($metry)',true))) as y from polygon_persil where id='$idPolygon' "));
                $item->persil->center_point = $center[0];
            }else{
                $item->persil->center_point = '0,0';
            }

        }
        //TODO get singkatan desa & kecamatan
        $desa = explode(" ", $sTDBRegister->anggota->alamat_desa_ktp);
        $desaNew = "";
        foreach ($desa as $w) {
            $sTDBRegister['desa'] .= $w[0];
        }

        $kecCleanSpace = implode(explode(",",$sTDBRegister->anggota->alamat_kec_ktp));
        $kecCleanComa = implode(explode(" ",$kecCleanSpace));
        $sTDBRegister['kecamatan'] = /*$kecCleanComa*/ $kecCleanComa[0].strtoupper($kecCleanComa[number_format(strlen($kecCleanComa)/2)]).strtoupper($kecCleanComa[(strlen($kecCleanComa)-1)]);
        return view('s_t_d_b_registers.print_stdb.cetak_stdb',compact('sTDBRegister','bulan'));
    }

    public function doneReview()
    {
        if (Auth::user()->hasRole('KPH')){
            $sTDBRegisters = STDBRegister::where('verified_by_kph',1)->get();
        }elseif (Auth::user()->hasRole('PPR')){
            $sTDBRegisters = STDBRegister::where('verified_by_ppr',1)->get();
        }elseif (Auth::user()->hasRole('BPN')){
            $sTDBRegisters = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id == 6;
            })->flatten();
        }elseif (Auth::user()->hasRole('admin') || Auth::user()->hasRole('admin_disbun')){
            $sTDBRegisters = STDBRegister::latest()->get()->filter(function ($q){
                return $q->latest_status->id == 2;
            })->flatten();
        }
        return view('s_t_d_b_registers.index')
            ->with('sTDBRegisters', $sTDBRegisters);
    }

    public function reportSTDB()
    {
        $years =[
            "0"=>"Tahun ini"
        ];
        $stdbYear = STDBRegister::groupBy('created_at')->get('created_at');
        foreach ($stdbYear as $item) {
            $years[date_format($item->created_at,'Y')]=date_format($item->created_at,'Y');
        }
        return view('s_t_d_b_registers.report',compact('years'));
    }

    public function allPersil()
    {
        return view('s_t_d_b_registers.show_stdb_persil');
    }
}
