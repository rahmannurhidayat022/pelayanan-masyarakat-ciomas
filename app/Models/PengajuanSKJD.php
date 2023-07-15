<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSKJD extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_skjd';

    protected $fillable = [
        'anggota_id',
        'pengantar_rw',
        'kategori',
        'cerai',
        'nama_pasangan',
        'nik',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
