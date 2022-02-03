<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKPHRequest;
use App\Http\Requests\UpdateKPHRequest;
use App\Models\Kecamatan;
use App\Models\KPH;
use App\Models\PolygonKPH;
use App\Repositories\KPHRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class KPHController extends AppBaseController
{
    /** @var  KPHRepository */
    private $kPHRepository;

    public function __construct(KPHRepository $kPHRepo)
    {
        $this->kPHRepository = $kPHRepo;
    }

    /**
     * Display a listing of the KPH.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kPHS = $this->kPHRepository->all();

        return view('k_p_h_s.index')
            ->with('kPHS', $kPHS);
    }

    /**
     * Show the form for creating a new KPH.
     *
     * @return Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $s = 0;
        return view('k_p_h_s.create', compact('kecamatan','s'));
    }

    /**
     * Store a newly created KPH in storage.
     *
     * @param CreateKPHRequest $request
     *
     * @return Response
     */
    public function store(CreateKPHRequest $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:kph,nama',
            'kecamatan' => 'required',
        ]);
        $input = $request->all();

        $kPH = KPH::create([
            'nama'=>$input['nama'],
            'unit_kph'=>$input['unit_kph'],
            'polygon_id'=>$input['polygon_id']
        ]);
        $kPH->kecamatans()->sync($input['kecamatan']);

        Flash::success('KPH saved successfully.');

        return redirect(route('kPHS.index'));
    }

    /**
     * Display the specified KPH.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }
        $kphKecamatan = Kecamatan::join("kph_has_kecamatan","kph_has_kecamatan.kecamatan_id","=","kecamatan.id")
            ->where("kph_has_kecamatan.kph_id",$id)
            ->get();

        return view('k_p_h_s.show')->with('kPH', $kPH);
    }

    /**
     * Show the form for editing the specified KPH.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }
        $kecamatan = Kecamatan::all();
        $kphKecamatan = DB::table("kph_has_kecamatan")->where("kph_has_kecamatan.kph_id",$id)
            ->pluck('kph_has_kecamatan.kecamatan_id','kph_has_kecamatan.kecamatan_id')
            ->all();
        $s = 1;

        return view('k_p_h_s.edit',compact('kecamatan','kphKecamatan','s'))->with('kPH', $kPH);
    }

    /**
     * Update the specified KPH in storage.
     *
     * @param int $id
     * @param UpdateKPHRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKPHRequest $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kecamatan' => 'required',
        ]);
//        $kPH = $this->kPHRepository->find($id);
        $kPH = KPH::find($id);
        if (empty($kPH)) {
            Flash::error('KPH not found');

            return redirect(route('kPHS.index'));
        }

        $kPH->nama = $request->input('nama');
        $kPH->unit_kph = $request->input('unit_kph');
        $kPH->polygon_id = $request->input('polygon_id');
        $kPH->save();
        $kPH->kecamatans()->sync($request->input('kecamatan'));
//        $kPH = $this->kPHRepository->update($request->all(), $id);

        Flash::success('K P H updated successfully.');

        return redirect(route('kPHS.index'));
    }

    /**
     * Remove the specified KPH from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }
        $kPH->kecamatans()->detach();
        $this->kPHRepository->delete($id);

        Flash::success('KPH deleted successfully.');

        return redirect(route('kPHS.index'));
    }

    public function getPolygonKPH($id){
        $kphPolygon = PolygonKPH::find($id);
        $features=[];
        $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_transform(kph_kutim.geom,4326)) from kph_kutim where id='$id'"));
        unset($kphPolygon->geom);
        $feature=['type'=>'Feature', 'geometry'=>json_decode($geom[0]->st_asgeojson),'properties'=>$kphPolygon];
        array_push($features,$feature);
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return  response()->json($featureCollections);

//        $kphPolygon = PolygonKPH::find($id);
//        $features=[];
//        $geometry = $kphPolygon->geom;
//        unset($kphPolygon->geom);
//        $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>$kphPolygon];
//        array_push($features,$feature);
//        $featureCollections = [
//            'type'=>'FeatureCollection',
//            'features'=>$features
//        ];
//        return response()->json($featureCollections);

    }
}

