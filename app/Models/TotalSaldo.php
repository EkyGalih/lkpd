<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class TotalSaldo extends Model
{
    use HasFactory;
    protected $table = 'total_saldo';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public static function getSubTotal($kode, $ref, $tahun)
    {
        return TotalSaldo::select('sub_total')
        ->where('kode_unik', '=', $kode)
        ->where('ref', '=', $ref)
        ->where('tahun_anggaran', '=', $tahun)
        ->sum('sub_total');
    }

    public static function getSubTotalBulan($kode, $tahun, $ref, $bulan)
    {
        return TotalSaldo::select('total_saldo.sub_total', 'total_saldo.id')
        ->where('kode_unik', '=', $kode)
        ->where('ref', '=', $ref)
        ->where('tahun_anggaran', '=', $tahun)
        ->where('bulan', '=', $bulan)
        ->sum('sub_total');
    }

    public static function getSubTotalBulanWeek($kode, $tahun, $ref, $bulan)
    {
        return TotalSaldo::join('arus_kas', 'total_saldo.ref', '=','arus_kas.ref2')
        ->select('total_saldo.id as weeks_id', 'total_saldo.*')
        ->where('total_saldo.kode_unik', '=', $kode)
        ->where('total_saldo.ref', '=', $ref)
        ->where('total_saldo.tahun_anggaran', '=', $tahun)
        ->where('total_saldo.bulan', '=', $bulan)
        ->orderBy('total_saldo.minggu', 'ASC')
        ->groupBy('total_saldo.minggu')
        ->get();
    }
}
