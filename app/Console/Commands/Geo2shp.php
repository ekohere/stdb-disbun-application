<?php

namespace App\Console\Commands;

use App\Models\Persil;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use Storage;

class Geo2shp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:postgre2shp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Storage::disk('public')->deleteDirectory('temp_shp');
        Storage::disk('public')->makeDirectory('temp_shp');
        $pathTemp = Storage::disk('public')->path('shp_polygon');

        $persil = Persil::whereNotNull('polygon_persil_id')->whereNull('shp_polygon')->first();
        if (!empty($persil)){
            try{
                $fileName = 'id_'.$persil->id.'_'.$persil->nama_peta."_np_".$persil->no_petak_peta;
                $command="cd ".$pathTemp."; pgsql2shp ".$fileName.".shp -h ".env("DB_HOST")." -u ".env("DB_USERNAME_PG")." -P ".
                    env("DB_PASSWORD_PG")." -p ".env("DB_PORT_PG")." ".env("DB_DATABASE_PG").' "select * from polygon_persil where id='.$persil->polygon_persil_id.';"';
                exec($command);

                $zipFile = new \PhpZip\ZipFile();
                try{
                    $zipFile
                        ->addDir(__DIR__, $pathTemp) // add files from the directory
                        ->saveAsFile($fileName) // save the archive to a file
                        ->close(); // close archive
                }
                catch(\PhpZip\Exception\ZipException $e){
                    // handle exception
                    return false;
                }
                finally{
                    $zipFile->close();
                }

                DB::beginTransaction();
                Storage::disk('public')->makeDirectory('shp_polygon');
                $persil->shp_polygon = 'storage/shp_polygon/'.$fileName.'.shp';
                DB::commit();
            }catch (\Exception $exception){
                DB::rollBack();
            }
        }
    }
}
