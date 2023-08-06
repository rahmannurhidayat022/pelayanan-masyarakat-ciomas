<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\Kegiatan;
use App\Models\Pengaduan;
use App\Models\PengajuanAkta;
use App\Models\PengajuanKK;
use App\Models\PengajuanKTP;
use App\Models\PengajuanSKBM;
use App\Models\PengajuanSKJD;
use App\Models\PengajuanSKKB;
use App\Models\PengajuanSKL;
use App\Models\PengajuanSKM;
use App\Models\PengajuanSKTM;
use App\Models\PengajuanSKW;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenduduk = AnggotaKeluarga::count();
        $totalPengaduan = Pengaduan::count();
        $totalKegiatan = Kegiatan::count();

        $akta = PengajuanAkta::count();
        $kk = PengajuanKK::count();
        $ktp = PengajuanKTP::count();
        $skbm = PengajuanSKBM::count();
        $skjd = PengajuanSKJD::count();
        $skkb = PengajuanSKKB::count();
        $skl = PengajuanSKL::count();
        $skm = PengajuanSKM::count();
        $sktm = PengajuanSKTM::count();
        $skw = PengajuanSKW::count();

        $totalPengajuan = $akta + $kk + $ktp + $skbm + $skjd + $skkb + $skl + $skm + $sktm + $skw;

        $listPengajuan = [
            [
                'jenis' => 'Akta',
                'total' => $akta,
            ],
            [
                'jenis' => 'KK',
                'total' => $kk,
            ],
            [
                'jenis' => 'KTP',
                'total' => $ktp,
            ],
            [
                'jenis' => 'SKBM',
                'total' => $skbm,
            ],
            [
                'jenis' => 'SKJD',
                'total' => $skjd,
            ],
            [
                'jenis' => 'SKKB',
                'total' => $skkb,
            ],
            [
                'jenis' => 'SKL',
                'total' => $skl,
            ],
            [
                'jenis' => 'SKM',
                'total' => $skm,
            ],
            [
                'jenis' => 'SKTM',
                'total' => $sktm,
            ],
            [
                'jenis' => 'SKW',
                'total' => $skw,
            ],
        ];

        $pengaduan = Pengaduan::where('is_read', 'false')->get();

        return view('dashboard', [
            'totalPenduduk' => $totalPenduduk,
            'totalPengaduan' => $totalPengaduan,
            'totalPengajuan' => $totalPengajuan,
            'totalKegiatan' => $totalKegiatan,
            'listPengajuan' => $listPengajuan,
            'pengaduan' => $pengaduan,
        ]);
    }
}
