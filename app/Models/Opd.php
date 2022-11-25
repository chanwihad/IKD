<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
    ];
    protected $table = 'opds';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'opd_id', 'id');
    }

    public function indikator()
    {
        return $this->hasMany(indikator::class, 'opd_id', 'id');
    }

    public static function getNameByOpd()
    {
        $name = Opd::where('id', \Auth::User()->opd_id)->first();
        return $name->name;
    }

    // public static function getNotifVerifikator($id)
    // {
    //     $notif =  Opd::where('id', $id)->with(['indikator' => function ($query) {
    //         $query->with(['indikatorDetail' => function ($query) {
    //             $query->where('verifikasi', 1);
    //         }]);
    //     }])->first();
    //     $jumlah = 0;
    //     foreach ($notif->indikator as $indikator) {
    //         foreach ($indikator->indikatorDetail as $data) {
    //             if ($data) {
    //                 $jumlah += 1;
    //             }
    //         }
    //     }
    //     return $jumlah;
    // }

    // public static function getNotifValidator($id)
    // {
    //     $notif =  Opd::where('id', $id)->with(['indikator' => function ($query) {
    //         $query->with(['indikatorDetail' => function ($query) {
    //             $query->where('validasi', 1);
    //         }]);
    //     }])->first();
    //     $jumlah = 0;
    //     foreach ($notif->indikator as $indikator) {
    //         foreach ($indikator->indikatorDetail as $data) {
    //             if ($data) {
    //                 $jumlah += 1;
    //             }
    //         }
    //     }
    //     return $jumlah;
    // }
}
