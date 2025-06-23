<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    protected $fillable = [
        'id_penggalang',
        'judul',
        'deskripsi',
        'target_donasi',
        'donasi_sekarang',
        'status',
        'image_url',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_penggalang');
    }

    public function donasis()
    {
        return $this->hasMany(Donasi::class, 'id_campaign');
    }
}
