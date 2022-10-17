<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ArusKas extends Model
{
    use HasFactory;

    protected $table = 'arus_kas';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public static function subTotalMasuk($ref2, $tahun)
    {
        return ArusKas::where('ref2', '=', $ref2)->where('tahun_anggaran', '=', $tahun)->select('anggaran')->first();
    }

    public static function getSubTotal($ref2, $tahun)
    {
        return ArusKas::where('ref2', '=', $ref2)->where('tahun_anggaran', '=', $tahun)->sum('anggaran');
    }
}
