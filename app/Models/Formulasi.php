<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Formulasi extends Model
{
    use HasFactory;

    protected $table = 'formulasi';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function IndikatorKinerja()
    {
        return $this->belongsTo(IndikatorKinerja::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
