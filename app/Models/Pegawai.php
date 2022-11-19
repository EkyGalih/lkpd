<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Pegawai extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'pegawai';
    protected $guarded = ['created_at', 'updated_at'];

    public static function static()
    {
        parent::boot();

        static::creating(function ($model){
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    public function Golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
}
