<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSKTM extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_sktm';

    protected $fillable = [
        'anggota_id',
        'pengantar_rw',
        'penghasilan',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }
}
