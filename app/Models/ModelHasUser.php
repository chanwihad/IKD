<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'user_id', 'nip', 'opd_id', 'name', 'status', 'role', 'password', 'created_at', 'updated_at'
    ];
    protected $table = 'model_has_users';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string'
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id', 'id');
    }

    public static function getUserList()
    {
        return ModelHasUser::with('opd')->get();
    }

    public static function getUserById($id)
    {
        return ModelHasUser::where('id', $id)->with('opd')->first();
    }

    public static function getUserRegistration()
    {
        return ModelHasUser::where('status', 'Registrasi')->with('opd')->get();
    }

    public static function getUserForgetPassword()
    {
        return ModelHasUser::where('status', 'Lupa Password')->with('opd')->get();
    }

    public static function getVerifiedById($nip)
    {
        return ModelHasUser::where('nip', $nip)->first();
    }

    public static function modelHasUserDelete($id)
    {
        return ModelHasUser::where('id', $id)->delete();
    }

    public static function userUpdateStatus($data)
    {
        return ModelHasUser::create([
            'name' => $data->name,
            'nip' => $data->nip,
            'user_id' => $data->id,
            'opd_id' => $data->opd_id,
            'role' => $data->status,
            'status' => 'Tidak Aktif',
        ]);
    }

    public static function userRegisSuccess($id)
    {
        return ModelHasUser::where('id', $id)->update([
            'status' => 'Registrasi Berhasil',
        ]);
    }

    public static function userPassSuccess($id)
    {
        return ModelHasUser::where('id', $id)->update([
            'status' => 'Lupa Password Berhasil',
        ]);
    }

    public static function userDeleteById($id)
    {
        return modelHasUser::where('id', $id)->delete();
    }

    public static function notif()
    {
        $regis = ModelHasUser::where('status', 'Registrasi')->count('id');
        $pass = ModelHasUser::where('status', 'Lupa Password')->count('id');
        return (int)$regis + (int)$pass;
    }
}
