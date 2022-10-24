<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class KodeRekening extends Model
{
    protected $table = 'kode_rekening';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function subKode()
    {
        return $this->hasMany(SubKodeRekening::class);
    }
}
