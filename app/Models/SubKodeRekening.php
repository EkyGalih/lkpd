<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class SubKodeRekening extends Model
{
    use HasFactory;

    protected $table = 'sub_kode_rekening';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function kodeRekening()
    {
        return $this->belongsTo(KodeRekening::class);
    }

    public static function getSubKode($id)
    {
        return SubKodeRekening::select('id as sub_kode_id', 'sub_kode_rekening.*')->where('kode_rekening_id', '=', $id)->orderBy('kode_rekening', 'ASC')->get();
    }
}
