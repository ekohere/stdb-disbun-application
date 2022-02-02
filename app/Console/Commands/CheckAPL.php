<?php

namespace App\Console\Commands;

use App\Models\PolygonPersil;
use App\Models\Unit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckAPL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:check-apl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status done rtrw dan set proses menjadi proses cc apl';

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
        $polygonPersil=PolygonPersil::where('status','CC RTRW Selesai')->first();
        if (!empty($polygonPersil)) {
                $polygonPersil->status="Proses CC APL";
                $polygonPersil->save();

                try{
                    $geom = DB::connection('pgsql')->select(DB::raw("select st_difference(polygon_persil.geom, st_makevalid(st_transform(apl_sk718_278_disolve.geom,4326))) from polygon_persil, apl_sk718_278_disolve where polygon_persil.id = $polygonPersil->id"));
                    $area_not_clean = DB::connection('pgsql')->select(DB::raw("select ST_area(st_difference(polygon_persil.geom, st_makevalid(st_transform(apl_sk718_278_disolve.geom,4326))),true)/10000 as area from polygon_persil, apl_sk718_278_disolve where polygon_persil.id = $polygonPersil->id"));
                    $area_in_float = floatval($area_not_clean[0]->area);
                    $polygonPersil->geom_cc_apl = $geom[0]->st_difference;
                    $polygonPersil->area_cc_apl = $area_in_float;
                    $polygonPersil->status="CC APL Selesai";
                    $polygonPersil->save();
                }catch (\Exception $exception){
                    $polygonPersil->status="Gagal CC APL";
                }
                $polygonPersil->save();

        }
    }
}
