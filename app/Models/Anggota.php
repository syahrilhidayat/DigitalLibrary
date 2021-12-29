<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    protected $fillable = [
        'nis',
        'nama_anggota',
        'kelas',
        'jurusan_id',
        'hp'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
