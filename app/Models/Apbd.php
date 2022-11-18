<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Apbd extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'apbd';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function Realisasi()
    {
        return $this->hasOne(LaporanRealisasiAnggaran::class, 'kode_rekening');
    }

    public static function getApbdTahun($TahunAnggaran, $KodeRekening)
    {
        $apbd = Apbd::select('jml_anggaran_setelah','kode_rekening', 'nama_rekening', 'tahun_anggaran')
                ->where('kode_rekening', '=', $KodeRekening)
                ->where('tahun_anggaran', '=', $TahunAnggaran)
                ->first();
        return $apbd;
    }

    public static function sumSub($TahunAnggaran, $KodeRekening)
    {

        $Apbd = Apbd::where('tahun_anggaran', '=', $TahunAnggaran)
                    ->where('kode_rekening', 'LIKE', $KodeRekening.'%')
                    ->select('jml_anggaran_setelah','kode_rekening')
                    ->get();
        $sum = [];

        foreach ($Apbd as $item) {
            if (strlen($item->kode_rekening) > 3) {
                array_push($sum, $item->jml_anggaran_setelah);
            }
        }

        return array_sum($sum);
    }

    public static function getSumSub($TahunAnggaran, $KodeRekening)
    {
        $Apbd = Apbd::select('jml_anggaran_setelah','kode_rekening', 'nama_rekening', 'tahun_anggaran')
                ->where('tahun_anggaran', '=', $TahunAnggaran)
                ->where('kode_rekening', 'LIKE', $KodeRekening.'%')
                ->orderBy('tahun_anggaran', 'ASC')
                ->get();

        $sum = [];

        foreach ($Apbd as $item) {
            if (strlen($item->kode_rekening) > 3) {
                array_push($sum, $item->jml_anggaran_setelah);
            }
        }

        return array_sum($sum);
    }
}
