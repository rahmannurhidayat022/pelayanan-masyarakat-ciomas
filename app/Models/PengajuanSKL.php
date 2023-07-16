<?php

namespace App\Models;

use App\Http\Services\ReformatDate;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function suratKeluar()
    {
        return $this->morphOne(SuratKeluar::class, 'surat');
    }

    public function penolakan()
    {
        return $this->morphOne(Penolakan::class, 'surat');
    }
}
