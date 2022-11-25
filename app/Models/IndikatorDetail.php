<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'indikator_id', 'nilai', 'satuan', 'tahun', 'target', 'capaian', 'validasi', 'verifikasi', 'publish', 'status', 'catatan', 'created_at', 'updated_at'
    ];
    protected $table = 'indikator_details';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string'
    ];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'indikator_id', 'id');
    }

    public static function getAllIndikatorDetail()
    {
        return IndikatorDetail::with('indikator.opd')->get();
    }

    public static function getAllIndikatorDetailVerified()
    {
        return IndikatorDetail::where('verifikasi', 1)->with('indikator.opd')->get();
    }
    public static function getAllIndikatorDetailNotVerified()
    {
        return IndikatorDetail::where('verifikasi', 0)->with('indikator.opd')->get();
    }

    public static function getIndikatorDetailList($id)
    {
        return IndikatorDetail::where('indikator_id', $id)->with('indikator')->get();
    }

    public static function getIndikatorDetailById($id)
    {
        return IndikatorDetail::where('id', $id)->first();
    }

    public static function indikatorDetailSaveCreate($data)
    {
        return IndikatorDetail::create($data);
    }

    public static function indikatorDetailSaveUpdate($data, $id)
    {
        $indikatorDetail = IndikatorDetail::where('id', $id)->first();
        return $indikatorDetail->update($data);
    }

    public static function indikatorDetailDelete($id)
    {
        return IndikatorDetail::where('id', $id)->delete();
    }

    public static function getNotifVerifikator($id)
    {
        return IndikatorDetail::where('verifikasi', 0)->where('opds.id', $id)
            ->leftJoin('indikators', function ($join) {
                $join->on('indikators.id', '=', 'indikator_details.indikator_id');
            })
            ->leftJoin('opds', function ($join) {
                $join->on('opds.id', '=', 'indikators.opd_id');
            })
            ->count('indikator_details.id');
    }

    public static function getNotifValidator($id)
    {
        return IndikatorDetail::where('validasi', 0)->where('opds.id', $id)
            ->leftJoin('indikators', function ($join) {
                $join->on('indikators.id', '=', 'indikator_details.indikator_id');
            })
            ->leftJoin('opds', function ($join) {
                $join->on('opds.id', '=', 'indikators.opd_id');
            })
            ->count('indikator_details.id');
    }
}
