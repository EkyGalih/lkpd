<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class IndikatorKinerja extends Model
{
    use HasFactory;

    protected $table = 'indikator_kinerja';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate(4);
        });
    }

    public static function getIK()
    {
        $indikatorKinerja = IndikatorKinerja::select('id as ik_id', 'indikator_kinerja.indikator_kinerja')->get();
        return $indikatorKinerja;
    }

    public function Formula()
    {
        return $this->hasMany(Formulasi::class);
    }

    public function IkuRealisasi()
    {
        return $this->hasOne(IkuRealisasi::class, 'id');
    }
}
