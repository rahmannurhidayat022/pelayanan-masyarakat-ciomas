<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKK extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_kk';

    protected $fillable = [
        'anggota_id',
        'jenis',
        'pengantar_rw',
        'kk',
        'ktp',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
