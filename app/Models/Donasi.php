<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';

    protected $fillable = [
        'id_campaign',
        'id_donatur',
        'nominal',
        'metode_pembayaran',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'id_campaign');
    }

    public function donatur()
    {
        return $this->belongsTo(Pengguna::class, 'id_donatur');
    }
}
