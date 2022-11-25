<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'opd_id', 'name', 'status', 'created_at', 'updated_at'
    ];
    protected $table = 'indikators';
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string'
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id', 'id');
    }

    public function indikatorDetail()
    {
        return $this->hasMany(IndikatorDetail::class, 'indikator_id', 'id');
    }

    public static function getJumlah()
    {
        return Indikator::withCount('indikatorDetail as jumlah')->get();
    }

    public static function getJumlahByOpd()
    {
        return Indikator::where('opd_id', \Auth::User()->opd_id)
        ->withCount('indikatorDetail as jumlah')->get();
    }

    public static function getAllIndikatorList()
    {
        return Indikator::withCount('indikatorDetail as jumlah')->with('opd')->get();
    }

    public static function getIndikator()
    {
        return Indikator::where('opd_id', \Auth::User()->opd_id)->get();
    }

    public static function getIndikatorList()
    {
        return Indikator::where('opd_id', \Auth::User()->opd_id)
        ->withCount('indikatorDetail as jumlah')
        ->with([
            'indikatorDetail' => function ($query) {
                // $query->whereRaw('tahun = (select MAX(`tahun`) from indikator_details)')->get();
                $query->orderBy('tahun', 'asc')->get();
            },
        ])->get();
    }

    public static function getIndikatorById($id)
    {
        return Indikator::where('id', $id)->with('indikatorDetail')->first();
    }

    public static function indikatorSaveCreate($data)
    {
        return Indikator::create($data);
    }

    public static function indikatorSaveUpdate($data, $id)
    {
        $indikator = Indikator::where('id', $id)->first();
        return $indikator->update($data);
    }

    public static function indikatorDelete($id)
    {
        return Indikator::where('id', $id)->delete();
    }
}
