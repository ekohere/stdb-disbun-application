<?php

namespace App\Exports;

use App\Models\PolygonPersil;
use App\Models\STDBDetailRegister;
use App\Models\STDBRegister;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;

class STDBExport implements FromView
{
    use Exportable;
    /**
     * @return View
     */
    public function view(): View
    {
        $startYear = STDBRegister::get()->filter(function ($q){
            return $q->latest_status->id==2;
        })->sortBy('created_at')->first();

        $todayYear = new DateTime(Carbon::today()->format('d M Y'));
        $startYear = new DateTime($startYear->created_at->format('d M Y'));

        $diff = $todayYear->diff($startYear);

        $month =[
            1=>"Januari", 2=>"Februari", 3=>"Maret", 4=>"April", 5=>"Mei", 6=>"Juni",
            7=>"Juli", 8=>"Agustus", 9=>"September", 10=>"Oktober", 11=>"November", 12=>"Desember",
        ];

        $records=[];
        for($i=0; $i<=$diff->y; $i++){
            foreach($month as $key=>$item){
                $data_field['Bulan'] = $item.' '.($startYear->format('Y')+$i);
                $data_field['Jumlah Petani Terdata'] = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
                    return $q->latest_status->id==2;
                })->flatten()->groupBy('anggota_id')->count();

                //tarik data stdb yang terverifikasi
                $stdbRegis = STDBRegister::whereMonth('created_at',$key)->get()->filter(function ($q){
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
        }

        return view('export_excel.stdb-table', [
            'dataSTDB' => $records
        ]);
    }
}
