<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Persil;
use App\Models\PolygonAPL718278;
use App\Models\PolygonPerkebunanKutim;
use App\Models\PolygonPersil;
use App\Models\STDBDetailRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SpatialAPIController extends AppBaseController
{
    public function allPolygonPersil()
    {
        $polygonPersil = PolygonPersil::all();

        //TODO transform data geom to geojson format
        $features=[];
        foreach ($polygonPersil as $key=>$item){
            $infoPersil[$key]['area'] = $item->area;
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
            $infoPersil[$key]['area'] = $item->area;
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
            $infoPersil['area'] = $item->area;
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
//        check debug purpouse here (Do not delete this comment below)
//        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select st_area(st_difference(polygon_persil.geom, st_transform(new_rtrw_disolve.geom,4326))) from polygon_persil, new_rtrw_disolve where polygon_persil.id = $id"));
//        $area_in_float = floatval($area_not_clean[0]->st_area);
//        $geom = DB::connection('pgsql')->select(DB::raw("select st_difference(polygon_persil.geom, st_transform(new_rtrw_disolve.geom,4326)) from polygon_persil, new_rtrw_disolve where polygon_persil.id = $id"));
//        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(polygon_persil.geom_cc_rtrw,true)/10000 as area from polygon_persil where polygon_persil.id = $id"));
//        return $area_in_float;

        $polygonPersil = PolygonPersil::where('id',$id)->get();
        $features=[];
        foreach ($polygonPersil as $key=>$item){
            $geometry =$item->geom_cc_rtrw;
            unset($item->geom_cc_rtrw);
            $feature=[
                'type'=>'Feature',
                'geometry'=>$geometry,
                'properties'=>[
                    'area'=>number_format($item->area_cc_rtrw,4,',','.'),
                    'status'=>$item->status
                ]
            ];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);

//        old code cc direct with query
//        ==========================================
//        $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_difference(polygon_persil.geom, st_makevalid(st_transform(rtrw_perkebunan_disolve.geom,4326)))) from polygon_persil, rtrw_perkebunan_disolve where polygon_persil.id = $id"));
//
//        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(st_difference(polygon_persil.geom, st_makevalid(st_transform(rtrw_perkebunan_disolve.geom,4326))),true)/10000 as area from polygon_persil, rtrw_perkebunan_disolve where polygon_persil.id = $id"));
//        $area_in_float = floatval($area_not_clean[0]->area);
//        $features=[];
//        foreach ($geom as $key=>$item){
//            $geometry = json_decode($item->st_asgeojson,true);
//            unset($item->st_asgeojson);
//            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>['area'=>number_format($area_in_float,0,',','.')]];
//            array_push($features,$feature);
//        }
//        $featureCollections = [
//            'type'=>'FeatureCollection',
//            'features'=>$features
//        ];
//        return response()->json($featureCollections);
    }

    public function ccAPL($id){
        $polygonPersil = PolygonPersil::find($id);
        $features=[];
        $geometry = $polygonPersil->geom_cc_apl;
        unset($polygonPersil->geom_cc_apl);
        $feature=[
            'type'=>'Feature',
            'geometry'=>$geometry,
            'properties'=>[
                'area'=>number_format($polygonPersil->area_cc_apl,4,',','.'),
                'status'=>$polygonPersil->status
            ]
        ];
        array_push($features,$feature);

        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);

//        old code cc direct with query
//        ==========================================
//        $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_difference(polygon_persil.geom, st_transform(apl_sk718_278_disolve.geom,4326))) from polygon_persil, apl_sk718_278_disolve where polygon_persil.id = $id"));
//        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(st_difference(polygon_persil.geom, st_transform(apl_sk718_278_disolve.geom,4326)),true)/10000 as area from polygon_persil, apl_sk718_278_disolve where polygon_persil.id = $id"));
//        $area_in_float = floatval($area_not_clean[0]->area);
//        $features=[];
//        foreach ($geom as $key=>$item){
//            $geometry = json_decode($item->st_asgeojson,true);
//            unset($item->st_asgeojson);
//            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>['area'=>number_format($area_in_float,0,',','.')]];
//            array_push($features,$feature);
//        }
//        $featureCollections = [
//            'type'=>'FeatureCollection',
//            'features'=>$features
//        ];
//        return response()->json($featureCollections);

    }

    public function getPolygonPerkebunan()
    {
        $featureCollections = Cache::remember("polygon-perkebunan",7200 , function (){
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
            return $featureCollections;
        });

        return  response()->json($featureCollections);
    }

    public function getPolygonAPL()
    {
        $featureCollections = Cache::remember("polygon-apl",7200 , function (){
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

            return $featureCollections;
        });


        return  response()->json($featureCollections);
    }

    public function ccKPH($id,$idKPH){
        $polygonPersil = PolygonPersil::find($id);
//        $idKPH = Auth::user()->kph->polygon_id;
//        old code cc direct with query
//        ==========================================
        $geom = DB::connection('pgsql')->select(DB::raw("select ST_AsGeoJSON(st_intersection(polygon_persil.geom, st_transform(kph_kutim.geom,4326))) from polygon_persil, kph_kutim where polygon_persil.id = $id and kph_kutim.id = $idKPH"));
        $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(st_intersection(polygon_persil.geom, st_transform(kph_kutim.geom,4326)),true)/10000 as area from polygon_persil, kph_kutim where polygon_persil.id = $id and kph_kutim.id = $idKPH"));
        $area_in_float = floatval($area_not_clean[0]->area);
        $features=[];
        foreach ($geom as $key=>$item){
            $geometry = json_decode($item->st_asgeojson,true);
            unset($item->st_asgeojson);
            $feature=['type'=>'Feature', 'geometry'=>$geometry,'properties'=>['area'=>number_format($area_in_float,4,',','.')]];
            array_push($features,$feature);
        }
        $featureCollections = [
            'type'=>'FeatureCollection',
            'features'=>$features
        ];
        return response()->json($featureCollections);

    }
}
