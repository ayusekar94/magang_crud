<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'tgl','image', 'kegiatan','karyawan_nip'];

    # Karyawan's kegiatan : Kegiatan dimiliki 1 karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_nip', 'NIP');
    }
}
