<?php

namespace App\Console\Commands;

use App\Models\Persil;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Storage;
use ZipArchive;

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
        $pathTemp = Storage::disk('public')->path('temp_shp');

        $persil = Persil::whereNotNull('polygon_persil_id')->whereNull('shp_polygon')->first();
        if (!empty($persil)){
            try{
                $fileName = 'id_'.$persil->id.'_'.str_replace(' ','-',$persil->nama_peta)."_np_".$persil->no_petak_peta;
                $command="cd ".$pathTemp."; pgsql2shp -f ".$fileName.".shp -h ".env("DB_HOST")." -u ".env("DB_USERNAME_PG")." -P ".
                    env("DB_PASSWORD_PG")." -p ".env("DB_PORT_PG")." ".env("DB_DATABASE_PG").' "select * from polygon_persil where id='.$persil->polygon_persil_id.';"';
                exec($command);

                Storage::disk('public')->makeDirectory('shp_polygon');
                $pathToSave = Storage::disk('public')->path('shp_polygon');

                $rootPath = realpath($pathTemp);
                // Initialize archive object
                $zip = new ZipArchive();
                $zip->open($pathToSave.'/'.$fileName.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($rootPath),
                    RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $name => $file)
                {
                    // Skip directories (they would be added automatically)
                    if (!$file->isDir())
                    {
                        // Get real and relative path for current file
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($rootPath) + 1);

                        // Add current file to archive
                        $zip->addFile($filePath, $relativePath);
                    }
                }
                // Zip archive will be created only after closing object
                $zip->close();

                DB::beginTransaction();
                $persil->shp_polygon = 'storage/shp_polygon/'.$fileName.'.zip';
                dd($persil);
                $persil->save();
                DB::commit();
            }catch (\Exception $exception){
                DB::rollBack();
                return $exception->getMessage();
            }
        }
    }
}
