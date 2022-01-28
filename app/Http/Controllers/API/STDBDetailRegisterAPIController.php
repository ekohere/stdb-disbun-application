<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSTDBDetailRegisterAPIRequest;
use App\Http\Requests\API\UpdateSTDBDetailRegisterAPIRequest;
use App\Models\Persil;
use App\Models\PolygonAPL718278;
use App\Models\PolygonPerkebunanKutim;
use App\Models\PolygonPersil;
use App\Models\STDBDetailRegister;
use App\Repositories\STDBDetailRegisterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class STDBDetailRegisterController
 * @package App\Http\Controllers\API
 */

class STDBDetailRegisterAPIController extends AppBaseController
{
    /** @var  STDBDetailRegisterRepository */
    private $sTDBDetailRegisterRepository;

    public function __construct(STDBDetailRegisterRepository $sTDBDetailRegisterRepo)
    {
        $this->sTDBDetailRegisterRepository = $sTDBDetailRegisterRepo;
    }

    /**
     * Display a listing of the STDBDetailRegister.
     * GET|HEAD /sTDBDetailRegisters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBDetailRegisters = $this->sTDBDetailRegisterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sTDBDetailRegisters->toArray(), 'S T D B Detail Registers retrieved successfully');
    }

    /**
     * Store a newly created STDBDetailRegister in storage.
     * POST /sTDBDetailRegisters
     *
     * @param CreateSTDBDetailRegisterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBDetailRegisterAPIRequest $request)
    {
        $input = $request->all();

        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->create($input);

        return $this->sendResponse($sTDBDetailRegister->toArray(), 'S T D B Detail Register saved successfully');
    }

    /**
     * Display the specified STDBDetailRegister.
     * GET|HEAD /sTDBDetailRegisters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var STDBDetailRegister $sTDBDetailRegister */
        $sTDBDetailRegister =STDBDetailRegister::with(['persil.anggota.koperasi'])->find($id);
        //set center point polygon
        $idPolygon = $sTDBDetailRegister->persil->polygon_persil_id;
        $metry = $sTDBDetailRegister->persil->polygonPersil->geom;
        $tes = json_encode($metry);
        $tes2 = json_decode($tes,true);
        $coordinates=[];
        foreach ($tes2['coordinates'][0] as $item){
            $coordinate = [];
            $coordinate['latitude'] = $item[0];
            $coordinate['longitude'] = $item[1];
            array_push($coordinates,$coordinate);
        };
        $sTDBDetailRegister->persil->coordinates = $coordinates;

        $center = DB::connection('pgsql')->select(DB::raw("select ST_X(ST_AsText(ST_Centroid('polygon($metry)',true))) as x, ST_Y(ST_AsText(ST_Centroid('polygon($metry)',true))) as y from polygon_persil where id='$idPolygon' "));
        $sTDBDetailRegister->persil->center_point = $center[0];


        if (empty($sTDBDetailRegister)) {
            return $this->sendError('S T D B Detail Register not found');
        }

        return $this->sendResponse($sTDBDetailRegister->toArray(), 'S T D B Detail Register retrieved successfully');
    }

    /**
     * Update the specified STDBDetailRegister in storage.
     * PUT/PATCH /sTDBDetailRegisters/{id}
     *
     * @param int $id
     * @param UpdateSTDBDetailRegisterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBDetailRegisterAPIRequest $request)
    {
        $input = $request->all();

        /** @var STDBDetailRegister $sTDBDetailRegister */
        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->find($id);

        if (empty($sTDBDetailRegister)) {
            return $this->sendError('S T D B Detail Register not found');
        }

        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->update($input, $id);

        return $this->sendResponse($sTDBDetailRegister->toArray(), 'STDBDetailRegister updated successfully');
    }

    /**
     * Remove the specified STDBDetailRegister from storage.
     * DELETE /sTDBDetailRegisters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var STDBDetailRegister $sTDBDetailRegister */
        $sTDBDetailRegister = $this->sTDBDetailRegisterRepository->find($id);

        if (empty($sTDBDetailRegister)) {
            return $this->sendError('S T D B Detail Register not found');
        }

        $sTDBDetailRegister->delete();

        return $this->sendSuccess('S T D B Detail Register deleted successfully');
    }

    public function getPolygonByIdRegister($id)
    {
        $detailRegis = STDBDetailRegister::where('stdb_register_id',$id)->get();
        //TODO get id persil in table polygon persil
        $idPersil = [];
        $infoPersil =[];
        foreach ($detailRegis as $item){
            if (!empty($item->stdb_persil_id)){
                array_push($infoPersil,$item->stdbPersil);
                array_push($idPersil, $item->stdbPersil->polygon_persil_id);
            }
            elseif (!empty($item->persil_id)){
                array_push($infoPersil,$item->persil);
                array_push($idPersil,$item->persil->polygon_persil_id);
            }
        }
        $polygonPersil = PolygonPersil::whereIn('id',$idPersil)->get();

        //TODO transform data geom to geojson format
        $features=[];
        foreach ($polygonPersil as $key=>$item){
            $infoPersil[$key]['area'] = $item->area*0.3048^2;
            $geometry =$item->geom;
            unset($item->geom);
            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>$infoPersil[$key]];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return  response()->json($featureCollections);
    }

    public function getPolygonPersilById($id)
    {
        $infoPersil = Persil::where('polygon_persil_id',$id)->get()->first();
        $polygonPersil = PolygonPersil::where('id',$id)->get();
        $features=[];
        foreach ($polygonPersil as $key=>$item){
            $infoPersil['area'] = $item->area*0.3048^2;
            $geometry =$item->geom;
            unset($item->geom);
            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>$infoPersil];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);
    }


    public function ccRTRW($id){
        $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_difference(st_makevalid(polygon_persil.geom), st_makevalid(st_transform(rtrw_perkebunan_disolve.geom,4326)))) from polygon_persil, rtrw_perkebunan_disolve where polygon_persil.id = $id"));

        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(st_difference(st_makevalid(polygon_persil.geom), st_makevalid(st_transform(rtrw_perkebunan_disolve.geom,4326))),true)/10000 as area from polygon_persil, rtrw_perkebunan_disolve where polygon_persil.id = $id"));
        $area_in_float = floatval($area_not_clean[0]->area);
        $features=[];
        foreach ($geom as $key=>$item){
            $geometry = json_decode($item->st_asgeojson,true);
            unset($item->st_asgeojson);
            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>['area'=>number_format($area_in_float,0,',','.')]];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);

    }

    public function ccAPL($id){
        $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_difference(st_makevalid(polygon_persil.geom), st_makevalid(st_transform(apl_sk718_278_disolve.geom,4326)))) from polygon_persil, apl_sk718_278_disolve where polygon_persil.id = $id"));

        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(st_difference(st_makevalid(polygon_persil.geom), st_makevalid(st_transform(apl_sk718_278_disolve.geom,4326))),true)/10000 as area from polygon_persil, apl_sk718_278_disolve where polygon_persil.id = $id"));
        $area_in_float = floatval($area_not_clean[0]->area);
        $features=[];
        foreach ($geom as $key=>$item){
            $geometry = json_decode($item->st_asgeojson,true);
            unset($item->st_asgeojson);
            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>['area'=>number_format($area_in_float,0,',','.')]];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);

    }

    public function getPolygonPerkebunan()
    {
        $kutimPerkebunan = PolygonPerkebunanKutim::all();
        $features=[];
        foreach ($kutimPerkebunan as $key=>$item){
            $properties['peta'] = $item->peta;
            $properties['rtrwk_2032'] = $item->rtrwk_2032;
            $properties['sk_554'] = $item->sk_554;
            $properties['ekse_4'] = $item->ekse_4;
            $properties['ekse_5'] = $item->ekse_5;
            $properties['peruntuk_r'] = $item->peruntuk_r;
            $properties['pola_ruang'] = $item->pola_ruang;
            $properties['outline'] = $item->outline;
            $properties['perimeter'] = $item->perimeter;
            $properties['area'] = $item->area;
            $properties['acres'] = $item->acres;
            $properties['hectares'] = $item->hectares;
            $properties['kab'] = $item->kab;

            $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_transform(rtrw_perkebunan.geom,4326)) from rtrw_perkebunan where id='$item->id'"));
            unset($item->geom);
            $feature=['type'=>'Feature', 'geometry'=>json_decode($geom[0]->st_asgeojson),'properties'=>$properties];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return  response()->json($featureCollections);
    }

    public function getPolygonAPL()
    {
        $kutimPerkebunan = PolygonAPL718278::all();
        $features=[];
        foreach ($kutimPerkebunan as $key=>$item){
            $properties['fid_kaltim'] = $item->peta;
            $properties['ekse_5'] = $item->ekse_5;
            $properties['kode'] = $item->kode;
            $properties['luas'] = $item->luas;
            $properties['sk_718'] = $item->sk_718;
            $properties['sk_278'] = $item->sk_278;
            $properties['sk_718_278'] = $item->sk_718_278;
            $properties['hektar'] = $item->hektar;

            $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_transform(apl_sk718_278.geom,4326)) from apl_sk718_278 where id='$item->id'"));
            unset($item->geom);
            $feature=['type'=>'Feature', 'geometry'=>json_decode($geom[0]->st_asgeojson),'properties'=>$properties];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return  response()->json($featureCollections);
    }
}
