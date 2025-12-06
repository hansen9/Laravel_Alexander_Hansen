<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'namaPasien',
        'alamat',
        'noTlp',
        'RSID',
    ];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'RSID');
    }
}
