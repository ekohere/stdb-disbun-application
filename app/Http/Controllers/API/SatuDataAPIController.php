<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\STDBRegister;

class SatuDataAPIController extends AppBaseController
{
    public function stdbValidPerStatus(){
        $data['fields'] = [
            [
                'id'=> 'Proses Verifikasi'
            ],
            [
                'id'=> 'Ditolak'
            ],
            [
                'id'=> 'Telah direview oleh KPH'
            ],
            [
                'id'=> 'Telah direview oleh PPR'
            ],
            [
                'id'=> 'Telah direview oleh BPN'
            ],
            [
                'id'=> 'Terverifikasi'
            ]
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
        $records=[];
        foreach($month as $key=>$item){
            $data_field['bulan'] = $item;
            $data_field['stdbProcess'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();
            $data_field['stdbVerified'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();
            $data_field['stdbRejected'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==3;
            })->flatten()->count();
            $data_field['stdbValidKPH'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==4;
            })->flatten()->count();
            $data_field['stdbValidPPR'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==5;
            })->flatten()->count();
            $data_field['stdbValidBPN'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                return $q->latest_status->id==6;
            })->flatten()->count();
            array_push($records,$data_field);
        }
        $data['records']= $records;

        return response()->json($data);
    }
}
