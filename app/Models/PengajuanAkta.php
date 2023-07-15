<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanAkta extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_akta';

    protected $fillable = [
        'anggota_id',
        'nama_anak',
        'surat_bidan',
        'tempat_lahir',
        'tanggal_lahir',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
