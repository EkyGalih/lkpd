<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ProgramAnggaran extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'program_anggaran_iku';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public function RealisasiCapaian()
    {
        return $this->hasMany(RealisasiCapaian::class);
    }
}
