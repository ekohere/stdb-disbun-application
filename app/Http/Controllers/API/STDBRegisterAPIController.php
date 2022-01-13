<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSTDBRegisterAPIRequest;
use App\Http\Requests\API\UpdateSTDBRegisterAPIRequest;
use App\Models\Persil;
use App\Models\PolygonPersil;
use App\Models\STDBDetailRegister;
use App\Models\STDBPersil;
use App\Models\STDBProfile;
use App\Models\STDBRegister;
use App\Models\STDBRegisterHasSTDBStatus;
use App\Repositories\STDBRegisterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class STDBRegisterController
 * @package App\Http\Controllers\API
 */

class STDBRegisterAPIController extends AppBaseController
{
    /** @var  STDBRegisterRepository */
    private $sTDBRegisterRepository;

    public function __construct(STDBRegisterRepository $sTDBRegisterRepo)
    {
        $this->sTDBRegisterRepository = $sTDBRegisterRepo;
    }

    /**
     * Display a listing of the STDBRegister.
     * GET|HEAD /sTDBRegisters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBRegisters = $this->sTDBRegisterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $dataGeospatial = PolygonPersil::get();
        $features=[];
        foreach ($dataGeospatial as $item){
            $geometry =$item->geom;
            unset($item->geom);
            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>$item];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);

//        return $this->sendResponse($sTDBRegisters->toArray(), 'STDB Registers retrieved successfully');
    }

    public function riwayatMappingOperatorKoperasi(Request $request){
        $stdbRegister = STDBRegister::with(['stdbDetailRegis.persil','anggota.koperasi'])->where('users_id',Auth::id())->latest()->get();
        foreach ($stdbRegister as $stdb){
            foreach ($stdb->stdbDetailRegis as $item){
                $idPolygon = $item->persil->polygon_persil_id;
                $metry = $item->persil->polygonPersil->geom;
                $center = DB::connection('pgsql')->select(DB::raw("select ST_X(ST_AsText(ST_Centroid('polygon($metry)',true))) as x, ST_Y(ST_AsText(ST_Centroid('polygon($metry)',true))) as y from polygon_persil where id='$idPolygon' "));
                $item->persil->center_point = $center[0];
            }
        }

        return $this->sendResponse($stdbRegister->toArray(), 'Mapping History Retrieved Succesfully');

    }

    /**
     * Store a newly created STDBRegister in storage.
     * POST /sTDBRegisters
     *
     * @param CreateSTDBRegisterAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->except('polygon');
        $geojson = strval(json_encode($request->polygon['features'][0]['geometry']));
        try{
            DB::beginTransaction();
            $polygonPersil = DB::connection('pgsql')->table('polygon_persil')->insertGetId(array(
                "stdb_detail_regis_id"=>1,
            ));

            $tes = DB::connection('pgsql')->update("update polygon_persil set geom= ST_GeomFromGeoJSON('$geojson') where stdb_detail_regis_id=1");
            return $tes;

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $this->sendError("Error:".$exception->getMessage());
        }

//        $polygon = json_encode($request->polygon['features'][0]['geometry']);
//        //return $request->polygon['features'][0]['geometry'];
//
//        $savePointData = [
//            'stdb_detail_regis_id' => 1,
//            'geom' => DB::raw("public.ST_SetSRID(public.ST_GeomFromGeoJSON('$polygon'), 4326)")
//        ];
//        $allDataRekod = PolygonPersil::create($savePointData);

//        return $allDataRekod;

//        $sTDBRegister = $this->sTDBRegisterRepository->create($input);

        return $this->sendResponse($sTDBRegister->toArray(), 'S T D B Register saved successfully');
    }

    /**
     * Display the specified STDBRegister.
     * GET|HEAD /sTDBRegisters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var STDBRegister $sTDBRegister */
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            return $this->sendError('S T D B Register not found');
        }

        return $this->sendResponse($sTDBRegister->toArray(), 'S T D B Register retrieved successfully');
    }

    /**
     * Update the specified STDBRegister in storage.
     * PUT/PATCH /sTDBRegisters/{id}
     *
     * @param int $id
     * @param UpdateSTDBRegisterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBRegisterAPIRequest $request)
    {
        $input = $request->all();

        /** @var STDBRegister $sTDBRegister */
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            return $this->sendError('S T D B Register not found');
        }

        $sTDBRegister = $this->sTDBRegisterRepository->update($input, $id);

        return $this->sendResponse($sTDBRegister->toArray(), 'STDBRegister updated successfully');
    }

    /**
     * Remove the specified STDBRegister from storage.
     * DELETE /sTDBRegisters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var STDBRegister $sTDBRegister */
        $sTDBRegister = $this->sTDBRegisterRepository->find($id);

        if (empty($sTDBRegister)) {
            return $this->sendError('S T D B Register not found');
        }

        $sTDBRegister->delete();

        return $this->sendSuccess('S T D B Register deleted successfully');
    }

    public function storeByKoperasi(Request $request)
    {
        $input = $request->except('polygon');
        $input['users_id'] = Auth::id();
        try{
            DB::beginTransaction();

            //TODO create stdb regis
            $stdbRegis = STDBRegister::create($input);
            $stdbRegis->save();

            //TODO set polygon to table polygon_persil and bound to table persil anggota koperasi
            foreach ($input['data_persil'] as $item){
                $newCoordinat = [];
                $coordinat = [];
                foreach ($item['coordinates'] as $coordinate){
                    $newCoordinat[0] = $coordinate['longitude'];
                    $newCoordinat[1] = $coordinate['latitude'];
                    array_push($coordinat,$newCoordinat);
                }
                $geometry['type'] = "Polygon";
                $geometry['coordinates'] = [$coordinat];
                $geojson = strval(json_encode($geometry));
                $geom = DB::connection('pgsql')->raw("ST_SetSRID(ST_GeomFromGeoJSON('$geojson'),4326)");
                $area = DB::connection('pgsql')->raw("ST_Area(ST_SetSRID(ST_GeomFromGeoJSON('$geojson'),4326))/10000");
                $polygonPersil = PolygonPersil::create([
                    "geom" => $geom,
                    "area" => $area
                ]);
                $polygonPersil->save();

                //TODO update to table persil
                $persil = Persil::find($item['persil_id']);
                $persil->polygon_persil_id = $polygonPersil->id;
                $persil->save();

                //TODO create stdb_detail_regis(item persil)
                $item['stdb_register_id'] = $stdbRegis->id;
                $stdbDetail = STDBDetailRegister::create($item);
                $stdbDetail->save();

                //$polygonPersil = DB::connection('pgsql')->insert("insert into polygon_persil(geom,area) values(ST_GeomFromGeoJSON('$geojson'),ST_Area(ST_GeomFromGeoJSON('$geojson')))");
            }

            //TODO create status stdb regis
            $statusSTDB = STDBRegisterHasSTDBStatus::create([
                "stdb_register_id" => $stdbRegis->id,
                "stdb_status_id" => 1
            ]);
            $statusSTDB->save();
            DB::commit();
            $dataSTDB = STDBRegister::with(['anggota','stdbDetailRegis.persil','stdbStatuses'])->find($stdbRegis->id);
            return $this->sendResponse($dataSTDB->toArray(),"STDB Requested Successfully");

        }catch (\Exception $exception){
            DB::rollBack();
            return $this->sendError("Error:".$exception);
        }
        //return $this->sendResponse($sTDBRegister->toArray(), 'STDB Register requested successfully');
    }

    public function storeByNonKoperasi(Request $request)
    {
        $input = $request->all();
        $input['users_id'] = Auth::id();
        $input['pemilik_kebun']['users_id'] = Auth::id();

        try{
            DB::beginTransaction();
            //TODO create stdb pemilik kebun
            $stdbPemilikKebun = STDBProfile::create($input['pemilik_kebun']);
            $stdbPemilikKebun->save();
            //TODO create stdb regis
            $stdbRegis = STDBRegister::create($input);
            $stdbRegis->save();

            //TODO set polygon to table polygon_persil and bound to table stdb_persil
            foreach ($input['data_persil'] as $item){
                $newCoordinat = [];
                $coordinat = [];
                foreach ($item['polygon']['coordinates'] as $coordinate){
                    $newCoordinat[0] = $coordinate['longitude'];
                    $newCoordinat[1] = $coordinate['latitude'];
                    array_push($coordinat,$newCoordinat);
                }
                $geometry['type'] = "Polygon";
                $geometry['coordinates'] = [$coordinat];
                $geojson = strval(json_encode($geometry));
                $geom = DB::connection('pgsql')->raw("ST_GeomFromGeoJSON('$geojson')");
//                $area = DB::connection('pgsql')->raw("ST_Area(ST_GeomFromGeoJSON('$geojson'))");
                $area = DB::connection('pgsql')->raw("ST_Area(ST_GeomFromGeoJSON('$geojson'))*POWER(0.3048,2)");
                $polygonPersil = PolygonPersil::create([
                    "geom" => $geom,
                    "area" => $area
                ]);
                $polygonPersil->save();

                //TODO create to table stdb_persil
                $item['persil']['polygon_persil_id'] = $polygonPersil->id;
                $item['persil']['users_id'] = Auth::id();
                $item['persil']['stdb_pemilik_kebun_id'] = $stdbPemilikKebun->id;
                $item['persil']['mitra_pengolahan'] = json_encode($item['persil']['mitra_pengolahan']);
                $item['persil']['total_biaya_produksi'] = $item['persil']['pupuk_tambah_upah'] +
                                                          $item['persil']['pestisida_tambah_upah'] +
                                                          $item['persil']['pembersihan_tambah_upah'] +
                                                          $item['persil']['panen_tambah_upah'] +
                                                          $item['persil']['biaya_lain'];

                $persil = STDBPersil::create($item['persil']);
                $persil->save();

                //TODO create stdb_detail_regis(item persil)
                $item['stdb_register_id'] = $stdbRegis->id;
                $item['stdb_persil_id'] = $persil->id;
                $stdbDetail = STDBDetailRegister::create($item);
                $stdbDetail->save();
            }

            //TODO create status stdb regis
            $statusSTDB = STDBRegisterHasSTDBStatus::create([
                "stdb_register_id" => $stdbRegis->id,
                "stdb_status_id" => 1
            ]);
            $statusSTDB->save();
            DB::commit();
            $dataSTDB = STDBRegister::with(['users.stdbProfile','stdbDetailRegis.stdbPersil','stdbStatuses'])->find($stdbRegis->id);
            return $this->sendResponse($dataSTDB->toArray(),"STDB Requested Successfully");

        }catch (\Exception $exception){
            DB::rollBack();
            return $this->sendError("Error:".$exception->getMessage());
        }
    }
}
