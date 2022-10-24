<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public static function getDivisi()
    {
        return Divisi::select('id as divisi_id', 'divisi.*')->get();
    }

    public function formula()
    {
        return $this->hasMany(Formulasi::class);
    }

    public function IkuRealisasi()
    {
        return $this->hasMany(IkuRealisasi::class);
    }

    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
