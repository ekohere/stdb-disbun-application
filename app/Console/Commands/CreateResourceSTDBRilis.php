<?php

namespace App\Console\Commands;

use App\Models\Dataset;
use App\Models\PolygonPersil;
use App\Models\Resources;
use App\Models\STDBDetailRegister;
use App\Models\STDBRegister;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateResourceSTDBRilis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-resource-stdb-rilis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create resource stdb rilis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $checkResourceYear = Resources::where('package_id',env('DATASET_ID_RILIS'))
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
                    'id'=> "Total Luasan Persil (ha)"
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
