<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class KodeRekening extends Model
{
    public $incrementing = false;
    protected $table = 'kode_rekening';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public static function getKodeRekening()
    {
        return KodeRekening::select('id', 'kode_rekening', 'nama_rekening')->orderBy('kode_rekening', 'ASC')->get();
    }

    public static function getSubKode()
    {
        $KodeRekening = [
            "kode_rekening" => array(),
            "nama_rekening" => array()
        ];
        $Get = KodeRekening::select('id', 'kode_rekening', 'nama_rekening')->orderBy('kode_rekening', 'ASC')->get();

        foreach ($Get as $item)
        {
            if (strlen($item->kode_rekening) > 3) {
                array_push($KodeRekening["kode_rekening"], $item->kode_rekening);
                array_push($KodeRekening["nama_rekening"], $item->nama_rekening);
            }
        }
        return $KodeRekening;

    }
}
