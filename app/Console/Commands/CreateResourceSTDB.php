<?php

namespace App\Console\Commands;

use App\Models\Dataset;
use App\Models\Resources;
use App\Models\STDBRegister;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateResourceSTDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-resource-stdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create resource stdb status';

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
                return 1;
            }catch (\Exception $exception){
                return 0;
            }
        }
    }
}