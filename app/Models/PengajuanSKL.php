<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSKL extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_skl';

    protected $fillable = [
        'anggota_id',
        'pengantar_rw',
        'nama_anak',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
