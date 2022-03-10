<?php

namespace App\Http\Livewire;

use App\Models\STDBRegister;
use App\Models\STDBStatus;
use http\Env\Request;
use Livewire\Component;

class STDBReport extends Component
{
    public $stdbProcess,$stdbValidKPH,$stdbValidPPR,$stdbVerified,$stdbRejected,$stdbValidBPN;
    public $status;

    public $year =[
        "0"=>"Semua Tahun"
    ];
    public $month =[
        0=>"Semua Bulan",
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

    public $monthSelected,$yearSelected;

    public function render()
    {
        $this->status = STDBStatus::all();
        //GET Tahun Dari Semua Pengajuan STDB sebagai option filter by tahun
        $stdbYear = STDBRegister::groupBy('created_at')->get('created_at');
        foreach ($stdbYear as $item) {
            $this->year[date_format($item->created_at,'Y')]=date_format($item->created_at,'Y');
        }

        //GET Data Pengajuan STDB berbagai jenis status
        if ($this->yearSelected==0 && $this->monthSelected==0){
            $this->stdbProcess = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();

            $this->stdbValidKPH = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==4;
            })->flatten()->count();

            $this->stdbValidPPR = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==5;
            })->flatten()->count();

            $this->stdbValidBPN = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==6;
            })->flatten()->count();

            $this->stdbVerified = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();

            $this->stdbRejected = STDBRegister::get()->filter(function ($q){
                return $q->latest_status->id==3;
            })->flatten()->count();

            //SET total dari jenis status STDB ke dalam data Status
            foreach ($this->status as $item){
                switch ($item->id){
                    case 1:
                        $item['total']=$this->stdbProcess;
                        break;
                    case 2:
                        $item['total']=$this->stdbVerified;
                        break;
                    case 3:
                        $item['total']=$this->stdbRejected;
                        break;
                    case 4:
                        $item['total']=$this->stdbValidKPH;
                        break;
                    case 5:
                        $item['total']=$this->stdbValidPPR;
                        break;
                    case 6:
                        $item['total']=$this->stdbValidBPN;
                        break;
                }
            }
        }
        elseif ($this->yearSelected!=0 && $this->monthSelected==0){
            $this->stdbProcess = STDBRegister::whereYear('created_at',$this->yearSelected)->get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();

            $this->stdbValidKPH = STDBRegister::whereYear('created_at',$this->yearSelected)->get()->filter(function ($q){
                return $q->latest_status->id==4;
            })->flatten()->count();

            $this->stdbValidPPR = STDBRegister::whereYear('created_at',$this->yearSelected)->get()->filter(function ($q){
                return $q->latest_status->id==5;
            })->flatten()->count();

            $this->stdbValidBPN = STDBRegister::whereYear('created_at',$this->yearSelected)->get()->filter(function ($q){
                return $q->latest_status->id==6;
            })->flatten()->count();

            $this->stdbVerified = STDBRegister::whereYear('created_at',$this->yearSelected)->get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();

            $this->stdbRejected = STDBRegister::whereYear('created_at',$this->yearSelected)->get()->filter(function ($q){
                return $q->latest_status->id==3;
            })->flatten()->count();

            //SET total dari jenis status STDB ke dalam data Status
            foreach ($this->status as $item){
                switch ($item->id){
                    case 1:
                        $item['total']=$this->stdbProcess;
                        break;
                    case 2:
                        $item['total']=$this->stdbVerified;
                        break;
                    case 3:
                        $item['total']=$this->stdbRejected;
                        break;
                    case 4:
                        $item['total']=$this->stdbValidKPH;
                        break;
                    case 5:
                        $item['total']=$this->stdbValidPPR;
                        break;
                    case 6:
                        $item['total']=$this->stdbValidBPN;
                        break;
                }
            }
        }
        elseif ($this->yearSelected==0 && $this->monthSelected!=0){
            $this->stdbProcess = STDBRegister::whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();

            $this->stdbValidKPH = STDBRegister::whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==4;
            })->flatten()->count();

            $this->stdbValidPPR = STDBRegister::whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==5;
            })->flatten()->count();

            $this->stdbValidBPN = STDBRegister::whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==6;
            })->flatten()->count();

            $this->stdbVerified = STDBRegister::whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();

            $this->stdbRejected = STDBRegister::whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==3;
            })->flatten()->count();

            //SET total dari jenis status STDB ke dalam data Status
            foreach ($this->status as $item){
                switch ($item->id){
                    case 1:
                        $item['total']=$this->stdbProcess;
                        break;
                    case 2:
                        $item['total']=$this->stdbVerified;
                        break;
                    case 3:
                        $item['total']=$this->stdbRejected;
                        break;
                    case 4:
                        $item['total']=$this->stdbValidKPH;
                        break;
                    case 5:
                        $item['total']=$this->stdbValidPPR;
                        break;
                    case 6:
                        $item['total']=$this->stdbValidBPN;
                        break;
                }
            }
        }
        elseif ($this->yearSelected!=0 && $this->monthSelected!=0){
            $this->stdbProcess = STDBRegister::whereYear('created_at',$this->yearSelected)->whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==1;
            })->flatten()->count();

            $this->stdbValidKPH = STDBRegister::whereYear('created_at',$this->yearSelected)->whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==4;
            })->flatten()->count();

            $this->stdbValidPPR = STDBRegister::whereYear('created_at',$this->yearSelected)->whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==5;
            })->flatten()->count();

            $this->stdbValidBPN = STDBRegister::whereYear('created_at',$this->yearSelected)->whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==6;
            })->flatten()->count();

            $this->stdbVerified = STDBRegister::whereYear('created_at',$this->yearSelected)->whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==2;
            })->flatten()->count();

            $this->stdbRejected = STDBRegister::whereYear('created_at',$this->yearSelected)->whereMonth('created_at',$this->monthSelected)->get()->filter(function ($q){
                return $q->latest_status->id==3;
            })->flatten()->count();

            //SET total dari jenis status STDB ke dalam data Status
            foreach ($this->status as $item){
                switch ($item->id){
                    case 1:
                        $item['total']=$this->stdbProcess;
                        break;
                    case 2:
                        $item['total']=$this->stdbVerified;
                        break;
                    case 3:
                        $item['total']=$this->stdbRejected;
                        break;
                    case 4:
                        $item['total']=$this->stdbValidKPH;
                        break;
                    case 5:
                        $item['total']=$this->stdbValidPPR;
                        break;
                    case 6:
                        $item['total']=$this->stdbValidBPN;
                        break;
                }
            }
        }
        return view('livewire.s-t-d-b-report');
    }
}
