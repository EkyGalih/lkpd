<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false;
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static function static()
    // {
    //     parent::boot();

    //     static::creating(function ($model){
    //         $model->id = (string)Uuid::generate(4);
    //     });
    // }

    public function Schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function Divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function Pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }
}
