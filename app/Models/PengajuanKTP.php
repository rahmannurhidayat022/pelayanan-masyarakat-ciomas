<?php

namespace App\Models;

use App\Http\Services\ReformatDate;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKTP extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_ktp';

    protected $fillable = [
        'anggota_id',
        'jenis',
        'pengantar_rw',
        'kk',
        'status',
    ];

    public function anggotaKeluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class, 'anggota_id');
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReformatDate::updateDateTimeTimezone($value),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReformatDate::updateDateTimeTimezone($value),
        );
    }
}
