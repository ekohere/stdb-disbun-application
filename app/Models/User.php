<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar','role_id','koperasi_id','kode_koperasi', 'email', 'password','settings'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules_create=[
        'name'=>'required',
        'username'=>'required',
        'email'=>'required|email',
        'password'=>'required|confirmed',
    ];

    public static $rules_update=[
//        'name'=>'required',
//        'username'=>'required',
//        'instansi_id'=>'required',
//        'email'=>'required|email',
//        'password_confirmation'=>'required_with:password',
    ];

    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class,'koperasi_id');
    }
    public function stdbProfile()
    {
        return $this->hasOne(STDBProfile::class,'users_id');
    }

}
