<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class ProgramAnggaran extends Model
{
    use HasFactory;

    protected $table = 'program_anggaran_iku';
    protected $guarded = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }

    public static function getProgramAnggaran()
    {
        $years = date('Y');
        return ProgramAnggaran::select('id as program_anggaran_id', 'program_anggaran_iku.*')
        ->where('created_at', 'LIKE', $years.'%')
        ->orderBy('created_at', 'ASC')
        ->get();
    }
}
