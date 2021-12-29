<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    protected $fillable = [
        'judul_buku',
        'kategori_id',
        'penulis',
        'penerbit'
    ];
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
