<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'rumah_sakit';

    protected $fillable = [
        'namaRS',
        'alamat',
        'email',
        'tlp',
    ];

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'RSID');
    }
}
