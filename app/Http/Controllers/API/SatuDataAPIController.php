<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Dataset;
use App\Models\PolygonPersil;
use App\Models\Resources;
use App\Models\STDBDetailRegister;
use App\Models\STDBRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SatuDataAPIController extends AppBaseController
{
    public function stdbValidPerStatus(){
        $checkResourceYear = Resources::whereYear('created_at',Carbon::today()->format('Y'))->get()->first();
        if (empty($checkResourceYear)){
            //push new year resource data
            $fields= [
                [
                    'id'=> "id"
                ],
                [
                    'id'=> "Bulan"
                ],
                [
                    'id'=> "Proses Verifikasi"
                ],
                [
                    'id'=> "Ditolak"
                ],
                [
                    'id'=> "Telah direview oleh KPH"
                ],
                [
                    'id'=> 'Telah direview oleh PPR'
                ],
                [
                    'id'=> 'Telah direview oleh BPN'
                ],
                [
                    'id'=> 'Terverifikasi'
                ],
            ];
            $year = Carbon::today()->format('Y');
            $month =[
                1=>"Januari",
                2=>"Februari",
                3=>"Maret",
                4=>"April",
                5=>"Mei",
                6=>"Juni",
                7=>"Juli",
                8=>"Agustus",
                9=>"September",
                10=>"Oktober",
                11=>"November",
                12=>"Desember",
            ];
            $dataset = Dataset::find(env('DATASET_ID'));
            $records=[];
            foreach($month as $key=>$item){
                $data_field['id'] = $key;
                $data_field['Bulan'] = $item;
                $data_field['Proses Verifikasi'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==1;
                })->flatten()->count();
                $data_field['Terverifikasi'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==2;
                })->flatten()->count();
                $data_field['Ditolak'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==3;
                })->flatten()->count();
                $data_field['Telah direview oleh KPH'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==4;
                })->flatten()->count();
                $data_field['Telah direview oleh PPR'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==5;
                })->flatten()->count();
                $data_field['Telah direview oleh BPN'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==6;
                })->flatten()->count();
                array_push($records,$data_field);
            }

            $resource['package_id'] = $dataset->id;
            $resource['language'] = 'INDONESIA';
            $resource['metadata_language'] = 'INDONESIA';
            $resource['name'] = 'Laporan Data Statistik Status STDB Tahun '.$year;
            $resource['title'] = 'Laporan Data Statistik Status STDB Tahun '.$year;
            $resource['description'] = 'Data Statistik Status STDB dari Web Admin E-STDB Kutai Timur';
            $resource['mimetype'] = 'application/json';
            $resource['format'] = 'json';
            try{
                $response = Http::withHeaders(['Authorization' => env('SATUDATA_KEY')])
                    ->post('https://data.kutaitimurkab.go.id/api/3/action/datastore_create',[
                        'resource' => $resource,
                        'fields' => $fields,
                        'primary_key'=>'id',
                        'records' => $records
                    ])->json();

                if (!empty($response)){
                    //save resource to database
                    $dataResource = Resources::create([
                        'id'=> $response['result']['resource_id'],
                        'package_id'=> $response['result']['resource']['package_id'],
                        'name'=> $response['result']['resource']['title'],
                        'description'=> $response['result']['resource']['description'],
                        'format'=> $response['result']['resource']['format'],
                        'year'=> $year,
                    ]);
                    $dataResource->save();
                }

                return response()->json($response);
            }catch (\Exception $exception){
                return response()->json("error: ".$exception);
            }
        }

    }

    public function updateSatuDataSTDB()
    {
        $data['fields']= [
            [
                'id'=> "id"
            ],
            [
                'id'=> "Bulan"
            ],
            [
                'id'=> "Proses Verifikasi"
            ],
            [
                'id'=> "Ditolak"
            ],
            [
                'id'=> "Telah direview oleh KPH"
            ],
            [
                'id'=> 'Telah direview oleh PPR'
            ],
            [
                'id'=> 'Telah direview oleh BPN'
            ],
            [
                'id'=> 'Terverifikasi'
            ],
        ];
        $month =[
            1=>"Januari",
            2=>"Februari",
            3=>"Maret",
            4=>"April",
            5=>"Mei",
            6=>"Juni",
            7=>"Juli",
            8=>"Agustus",
            9=>"September",
            10=>"Oktober",
            11=>"November",
            12=>"Desember",
        ];
        $year = Carbon::today()->format('Y');
        $dataset = Dataset::find('e88c5c82-5a60-4d12-bc04-1d695c732c59');

        $records=[];
        foreach($month as $key=>$item){
            $data_field['id'] = $key;
            $data_field['Bulan'] = $item;
            $data_field['Proses Verifikasi'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();
            $data_field['Terverifikasi'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();
            $data_field['Ditolak'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==3;
            })->flatten()->count();
            $data_field['Telah direview oleh KPH'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==4;
            })->flatten()->count();
            $data_field['Telah direview oleh PPR'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==5;
            })->flatten()->count();
            $data_field['Telah direview oleh BPN'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==6;
            })->flatten()->count();
            array_push($records,$data_field);
        }
        $resource['package_id'] = $dataset->id;
        $resource['language'] = 'INDONESIA';
        $resource['metadata_language'] = 'INDONESIA';
        $resource['name'] = 'Laporan Data Statistik Status STDB Tahun '.$year;
        $resource['title'] = 'Laporan Data Statistik Status STDB Tahun '.$year;
        $resource['description'] = 'Data Statistik Status STDB dari Web Admin E-STDB Kutai Timur';
        $resource['mimetype'] = 'application/json';
        $resource['format'] = 'json';
        try{
            $response = Http::withHeaders(['Authorization' => env('SATUDATA_KEY')])
                ->post('https://data.kutaitimurkab.go.id/api/3/action/datastore_upsert',[
                    'resource_id'=>'21e0f7b0-23aa-4154-8b56-daed827cab7b',
                    'resource' => $resource,
                    'primary_key'=>["id"],
                    'records' => $records
                ]);

            return response()->json($response->json());
        }catch (\Exception $exception){
            return response()->json("error: ".$exception);
        }
    }

    public function stdbRilis()
    {
        $checkResourceYear = Resources::where('package_id','2e247a5a-a6c5-43cf-8801-546df509425b')
            ->whereYear('created_at',Carbon::today()->format('Y'))
            ->get()
            ->first();
        if (empty($checkResourceYear)){
            $fields= [
                [
                    'id'=> "id"
                ],
                [
                    'id'=> "Bulan"
                ],
                [
                    'id'=> "Jumlah Petani Terdata"
                ],
                [
                    'id'=> "Jumlah Persil"
                ],
                [
                    'id'=> "Total Luasan Persil"
                ],
            ];
            $year = Carbon::today()->format('Y');
            $month =[
                1=>"Januari",
                2=>"Februari",
                3=>"Maret",
                4=>"April",
                5=>"Mei",
                6=>"Juni",
                7=>"Juli",
                8=>"Agustus",
                9=>"September",
                10=>"Oktober",
                11=>"November",
                12=>"Desember",
            ];

            $dataset = Dataset::find('2e247a5a-a6c5-43cf-8801-546df509425b');
            $records=[];
            foreach($month as $key=>$item){
                $data_field['id'] = $key;
                $data_field['Bulan'] = $item;

                $data_field['Jumlah Petani Terdata'] = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==2;
                })->flatten()->groupBy('anggota_id')->count();

                //tarik data stdb yang terverifikasi
                $stdbRegis = STDBRegister::whereYear('created_at',$year)->whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==2;
                })->flatten();
                $idSTDB = [];
                foreach ($stdbRegis as $stdb){
                    array_push($idSTDB,$stdb->id);
                }
                //tarik data jumlah persil dari stdb yang sudah terverifikasi
                $data_field['Jumlah Persil'] = STDBDetailRegister::whereIn('stdb_register_id',$idSTDB)->get()->count();

                $detilSTDB = STDBDetailRegister::whereIn('stdb_register_id',$idSTDB)->get();
                $idPersilPloygon = [];
                foreach ($detilSTDB as $detil){
                    array_push($idPersilPloygon, $detil->persil->polygon_persil_id);
                }
                $data_field['Total Luasan Persil'] = PolygonPersil::whereIn('id',$idPersilPloygon)->get()->sum('area');

                array_push($records,$data_field);
            }

            $resource['package_id'] = $dataset->id;
            $resource['language'] = 'INDONESIA';
            $resource['metadata_language'] = 'INDONESIA';
            $resource['name'] = 'Laporan Data Statistik STDB Rilis Tahun '.$year;
            $resource['title'] = 'Laporan Data Statistik STDB Rilis Tahun '.$year;
            $resource['description'] = 'Laporan Data Statistik Rilis STDB dari Web Admin E-STDB Kutai Timur yang berisi data statistik jumlah petani yang didata, jumlah persil, dan jumlah luasan hektar dari pengajuan STDB online tahun '.$year;
            $resource['mimetype'] = 'application/json';
            $resource['format'] = 'json';
            try{
                $response = Http::withHeaders(['Authorization' => env('SATUDATA_KEY')])
                    ->post('https://data.kutaitimurkab.go.id/api/3/action/datastore_create',[
                        'resource' => $resource,
                        'fields' => $fields,
                        'primary_key'=>'id',
                        'records' => $records
                    ])->json();

                if (!empty($response)){
                    //save resource to database
                    $dataResource = Resources::create([
                        'id'=> $response['result']['resource_id'],
                        'package_id'=> $response['result']['resource']['package_id'],
                        'name'=> $response['result']['resource']['title'],
                        'description'=> $response['result']['resource']['description'],
                        'format'=> $response['result']['resource']['format'],
                        'year'=> $year,
                    ]);
                    $dataResource->save();
                }

                return response()->json($response);
            }catch (\Exception $exception){
                return response()->json("error: ".$exception);
            }
        }
    }
}
