<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSKM extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_skm';

    protected $fillable = [
        'anggota_id',
        'pengantar_rw',
        'nama_pasangan',
        'nik',
        'alamat',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
