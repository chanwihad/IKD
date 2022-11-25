<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'opd_id',
        'name',
        'email',
        'password',
        'nip',
        'nama_opd',
        'status',
        'jabatan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id', 'id');
    }

    public function isVerifikator()
    {
        return $this->hasRole('verifikator');
    }
    public function isValidator()
    {
        return $this->hasRole('validator');
    }
    public function isProdusenData()
    {
        return $this->hasRole('produsen_data');
    }
    public function isAdministrator()
    {
        return $this->hasRole('admin');
    }

    public static function getUser()
    {
        return User::with('opd')->orderBy('name')->get();
    }
    
    public static function getUserById($id)
    {
        return User::where('id', $id)->first();
    }

    public static function userDelete($id)
    {
        return User::where('id', $id)->delete();
    }

    public static function userStatusUpdate($id)
    {
        return User::where('id', $id)->update([
            'nip' => NULL,
            'nama_opd' => NULL,
        ]);
    }

    public static function getUserByNipEmail($nip, $email)
    {
        return User::where('nip', $nip)->where('email', $email)->first();
    }
    
    // @if(Auth::User()->isAdministrator() || Auth::User()->isAdminDivisi())
    // @if($user->isAdministrator())
}
