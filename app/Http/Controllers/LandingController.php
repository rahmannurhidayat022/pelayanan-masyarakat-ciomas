<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
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

class LandingController extends Controller
{
    public function index()
    {
        $totalPenduduk = AnggotaKeluarga::count();
        $totalPengaduan = Pengaduan::count();

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

        return view('index', [
            'totalPenduduk' => $totalPenduduk,
            'totalPengaduan' => $totalPengaduan,
            'totalPengajuan' => $totalPengajuan,
        ]);
    }
}
