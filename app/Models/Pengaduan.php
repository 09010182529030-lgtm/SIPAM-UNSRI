<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'kategori',
        'judul',
        'isi',
        'evidence_path',
        'status',
    ];

    public function statusHistories(): HasMany
    {
        return $this->hasMany(PengaduanStatusHistory::class);
    }
}