<?php

namespace App\Console\Commands;

use App\Models\PolygonPersil;
use App\Models\Unit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckRTRW extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:check-rtrw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status CC APL Selesai dan set proses menjadi proses cc rtrw';

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
        $polygonPersil=PolygonPersil::where('status','CC APL Selesai')->first();

        if (!empty($polygonPersil)) {
                $polygonPersil->status="Proses CC RTRW";
                $polygonPersil->save();

                try{
                    $area_not_clean = DB::connection('pgsql')->select(DB::raw("select st_area(st_difference(polygon_persil.geom, st_transform(new_rtrw_disolve.geom,4326))) from polygon_persil, new_rtrw_disolve where polygon_persil.id = $polygonPersil->id"));
                    $area_in_float = floatval($area_not_clean[0]->area);
                    $polygonPersil->area_cc_rtrw = $area_in_float;

                    if ($area_not_clean[0]->area>0){
                        $geom = DB::connection('pgsql')->select(DB::raw("select st_difference(polygon_persil.geom, st_transform(new_rtrw_disolve.geom,4326)) from polygon_persil, new_rtrw_disolve where polygon_persil.id = $polygonPersil->id"));
                        $polygonPersil->geom_cc_rtrw = $geom[0]->st_difference;
                    }
                    $polygonPersil->status = "CC RTRW Selesai";
                    $polygonPersil->save();

                }catch (\Exception $exception){
                    $polygonPersil->status = "Gagal CC RTRW";
                }
                $polygonPersil->save();
        }
    }
}
