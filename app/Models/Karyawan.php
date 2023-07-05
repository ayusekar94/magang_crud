<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'NIP',
        'nama',
        'password',
        'divisi'
    ];

    # Karyawan has many kegiatans
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
