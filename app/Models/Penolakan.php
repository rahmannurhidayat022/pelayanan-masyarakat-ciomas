<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penolakan extends Model
{
    use HasFactory;
    protected $table = 'penolakan';
    protected $fillable = ['surat_id', 'pesan', 'jenis_surat'];

    public function surat()
    {
        return $this->morphTo();
    }
}
