<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class LaporanRealisasiAnggaran extends Model
{
    use HasFactory;

    protected $table = 'realisasi_anggaran';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function apbd()
    {
        return $this->belongsTo(Apbd::class, 'kode_rekening');
    }

    public static function sumSub($kode_rekening)
    {
        return LaporanRealisasiAnggaran::where('kode_rekening', 'Like', $kode_rekening.'%')->select('anggaran_terealisasi')->sum('anggaran_terealisasi');
    }
}
