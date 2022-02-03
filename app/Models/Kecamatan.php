<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    public $table = 'kecamatan';

    public function koperasi()
    {
        return $this->hasMany(\App\Models\Koperasi::class, 'kecamatan_id');
    }

    public function desa()
    {
        return $this->hasMany(\App\Models\Desa::class, 'kode_kec');
    }

    public function KPHs()
    {
        return $this->belongsToMany(\App\Models\KPH::class, 'kph_has_kecamatan','kph_id','kecamatan_id');
    }
}
