<?php

namespace App\Models;

use App\Http\Services\ReformatDate;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;
    protected $table = 'kartu_keluarga';

    protected $fillable = [
        'kepala_keluarga',
        'no_kk',
        'alamat',
        'rt_rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'kode_pos',
        'provinsi',
    ];

    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'kk_id');
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
