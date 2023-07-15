<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSKBM extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_skbm';

    protected $fillable = [
        'anggota_id',
        'pengantar_rw',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
