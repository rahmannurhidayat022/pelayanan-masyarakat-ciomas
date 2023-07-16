<?php

namespace App\Http\Controllers;

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
use App\Models\SuratKeluar;
use App\Models\Penolakan;
use Illuminate\Http\Request;

class PenolakanController extends Controller
{
    public function store(Request $request)
    {
        try {
            $jenis_surat = $request->jenis_surat;

            $surat_keluar = new Penolakan();
            $surat_keluar->surat_id = $request->input('surat_id');
            $surat_keluar->pesan = $request->input('pesan');
            $surat_keluar->jenis_surat = $jenis_surat;
            $surat_keluar->save();

            if ($jenis_surat === "Pengajuan KK") {
                $data = PengajuanKK::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan KTP") {
                $data = PengajuanKTP::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan Akta") {
                $data = PengajuanAkta::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKTM") {
                $data = PengajuanSKTM::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKBM") {
                $data = PengajuanSKBM::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKJD") {
                $data = PengajuanSKJD::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKKB") {
                $data = PengajuanSKKB::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKL") {
                $data = PengajuanSKL::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKM") {
                $data = PengajuanSKM::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else if ($jenis_surat === "Pengajuan SKW") {
                $data = PengajuanSKW::with('AnggotaKeluarga')->findOrFail($request->surat_id);
            } else {
                return redirect()->back()->with('error', 'pengajuan tidak ditemukan');
            }

            $data->status = 'ditolak';
            $data->update();

            return redirect()->back()->with('success', 'Surat Keluar berhasil ditolak.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Surat Keluar gagal ditolak.');
        }
    }
}
