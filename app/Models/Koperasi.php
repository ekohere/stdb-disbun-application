<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Koperasi
 * @package App\Models
 * @version December 1, 2021, 4:57 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $anggota
 * @property \Illuminate\Database\Eloquent\Collection $asets
 * @property \Illuminate\Database\Eloquent\Collection $bahanPemeliharaans
 * @property \Illuminate\Database\Eloquent\Collection $barangs
 * @property \Illuminate\Database\Eloquent\Collection $barangSaprodis
 * @property \Illuminate\Database\Eloquent\Collection $drivers
 * @property \Illuminate\Database\Eloquent\Collection $gajis
 * @property \Illuminate\Database\Eloquent\Collection $gajiPetanis
 * @property \Illuminate\Database\Eloquent\Collection $golonganStatusPekerjas
 * @property \Illuminate\Database\Eloquent\Collection $hargas
 * @property \Illuminate\Database\Eloquent\Collection $itemBahanPemeliharaans
 * @property \Illuminate\Database\Eloquent\Collection $karyawans
 * @property \Illuminate\Database\Eloquent\Collection $kelolaLingkungans
 * @property \Illuminate\Database\Eloquent\Collection $konfliks
 * @property \Illuminate\Database\Eloquent\Collection $kontraks
 * @property \Illuminate\Database\Eloquent\Collection $koperasiSettings
 * @property \Illuminate\Database\Eloquent\Collection $laporanPanens
 * @property \Illuminate\Database\Eloquent\Collection $mitras
 * @property \Illuminate\Database\Eloquent\Collection $neracaKeuangans
 * @property \Illuminate\Database\Eloquent\Collection $neracaSimpanPinjams
 * @property \Illuminate\Database\Eloquent\Collection $pekerjas
 * @property \Illuminate\Database\Eloquent\Collection $pelatihans
 * @property \Illuminate\Database\Eloquent\Collection $pembelianBarangs
 * @property \Illuminate\Database\Eloquent\Collection $pemeliharaans
 * @property \Illuminate\Database\Eloquent\Collection $pengurus
 * @property \Illuminate\Database\Eloquent\Collection $penjualanSaprodis
 * @property \Illuminate\Database\Eloquent\Collection $penjualanTbs
 * @property \Illuminate\Database\Eloquent\Collection $persils
 * @property \Illuminate\Database\Eloquent\Collection $petaPersils
 * @property \Illuminate\Database\Eloquent\Collection $profils
 * @property \Illuminate\Database\Eloquent\Collection $risalahs
 * @property \Illuminate\Database\Eloquent\Collection $spbs
 * @property \Illuminate\Database\Eloquent\Collection $transports
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $kode_kec
 * @property string $kode_koperasi
 * @property string $nama_koperasi
 * @property string $alamat
 * @property string $telepon
 */
class Koperasi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'koperasi';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_kec',
        'kode_koperasi',
        'nama_koperasi',
        'alamat',
        'telepon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_kec' => 'string',
        'kode_koperasi' => 'string',
        'nama_koperasi' => 'string',
        'alamat' => 'string',
        'telepon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_kec' => 'required|string|max:50',
        'kode_koperasi' => 'required|string|max:50',
        'nama_koperasi' => 'required|string|max:150',
        'alamat' => 'required|string|max:150',
        'telepon' => 'required|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anggota()
    {
        return $this->hasMany(\App\Models\Anggota::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function asets()
    {
        return $this->hasMany(\App\Models\Aset::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bahanPemeliharaans()
    {
        return $this->hasMany(\App\Models\BahanPemeliharaan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function barangs()
    {
        return $this->hasMany(\App\Models\Barang::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function barangSaprodis()
    {
        return $this->hasMany(\App\Models\BarangSaprodi::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function drivers()
    {
        return $this->hasMany(\App\Models\Driver::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gajis()
    {
        return $this->hasMany(\App\Models\Gaji::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gajiPetanis()
    {
        return $this->hasMany(\App\Models\GajiPetani::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function golonganStatusPekerjas()
    {
        return $this->hasMany(\App\Models\GolonganStatusPekerja::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function hargas()
    {
        return $this->hasMany(\App\Models\Harga::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function itemBahanPemeliharaans()
    {
        return $this->hasMany(\App\Models\ItemBahanPemeliharaan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kelolaLingkungans()
    {
        return $this->hasMany(\App\Models\KelolaLingkungan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function konfliks()
    {
        return $this->hasMany(\App\Models\Konflik::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kontraks()
    {
        return $this->hasMany(\App\Models\Kontrak::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function koperasiSettings()
    {
        return $this->hasMany(\App\Models\KoperasiSetting::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function laporanPanens()
    {
        return $this->hasMany(\App\Models\LaporanPanen::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mitras()
    {
        return $this->hasMany(\App\Models\Mitra::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function neracaKeuangans()
    {
        return $this->hasMany(\App\Models\NeracaKeuangan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function neracaSimpanPinjams()
    {
        return $this->hasMany(\App\Models\NeracaSimpanPinjam::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pekerjas()
    {
        return $this->hasMany(\App\Models\Pekerja::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pelatihans()
    {
        return $this->hasMany(\App\Models\Pelatihan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pembelianBarangs()
    {
        return $this->hasMany(\App\Models\PembelianBarang::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pemeliharaans()
    {
        return $this->hasMany(\App\Models\Pemeliharaan::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pengurus()
    {
        return $this->hasMany(\App\Models\Penguru::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanSaprodis()
    {
        return $this->hasMany(\App\Models\PenjualanSaprodi::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanTbs()
    {
        return $this->hasMany(\App\Models\PenjualanTb::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function persils()
    {
        return $this->hasMany(\App\Models\Persil::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function petaPersils()
    {
        return $this->hasMany(\App\Models\PetaPersil::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function profils()
    {
        return $this->hasMany(\App\Models\Profil::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function risalahs()
    {
        return $this->hasMany(\App\Models\Risalah::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spbs()
    {
        return $this->hasMany(\App\Models\Spb::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transports()
    {
        return $this->hasMany(\App\Models\Transport::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'koperasi_id');
    }
}
