<?php

namespace App\Models;

use App\Http\Services\ReformatDate;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;
    protected $table = 'anggota_keluarga';

    protected $fillable = [
        'kk_id',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
        'status_pernikahan',
        'status_hubungan',
        'kewarganegaraan',
        'no_paspor',
        'no_kitas',
        'nama_ayah',
        'nama_ibu',
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'kk_id');
    }

    public function pengajuanKK()
    {
        return $this->hasMany(PengajuanKK::class, 'anggota_id');
    }

    public function pengajuanKTP()
    {
        return $this->hasMany(PengajuanKTP::class, 'anggota_id');
    }

    public function pengajuanAkta()
    {
        return $this->hasMany(PengajuanAkta::class, 'anggota_id');
    }

    public function pengajuanSKTM()
    {
        return $this->hasMany(PengajuanSKTM::class, 'anggota_id');
    }

    public function pengajuanSKBM()
    {
        return $this->hasMany(PengajuanSKBM::class, 'anggota_id');
    }

    public function pengajuanSKJD()
    {
        return $this->hasMany(PengajuanSKJD::class, 'anggota_id');
    }

    public function pengajuanSKKB()
    {
        return $this->hasMany(PengajuanSKKB::class, 'anggota_id');
    }

    public function pengajuanSKL()
    {
        return $this->hasMany(PengajuanSKL::class, 'anggota_id');
    }

    public function pengajuanSKM()
    {
        return $this->hasMany(PengajuanSKM::class, 'anggota_id');
    }

    public function pengajuanSKW()
    {
        return $this->hasMany(PengajuanSKW::class, 'anggota_id');
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
