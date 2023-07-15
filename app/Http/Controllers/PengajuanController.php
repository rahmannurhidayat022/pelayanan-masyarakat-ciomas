<?php

namespace App\Http\Controllers;

use App\FileHandler\FileHandler;
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
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PengajuanController extends Controller
{
    public function index()
    {
        return view('pengajuan');
    }

    public function dashIndex(Request $request)
    {
        if ($request->ajax()) {
            $pengajuan_kk = PengajuanKK::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan KK' as jenis_pengajuan"))
                ->get();

            $pengajuan_ktp = PengajuanKTP::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan KTP' as jenis_pengajuan"))
                ->get();

            $pengajuan_akta = PengajuanAkta::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan Akta' as jenis_pengajuan"))
                ->get();

            $pengajuan_sktm = PengajuanSKTM::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKTM' as jenis_pengajuan"))
                ->get();

            $pengajuan_skbm = PengajuanSKBM::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKBM' as jenis_pengajuan"))
                ->get();

            $pengajuan_skjd = PengajuanSKJD::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKJD' as jenis_pengajuan"))
                ->get();

            $pengajuan_skkb = PengajuanSKKB::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKKB' as jenis_pengajuan"))
                ->get();

            $pengajuan_skl = PengajuanSKL::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKL' as jenis_pengajuan"))
                ->get();

            $pengajuan_skm = PengajuanSKM::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKM' as jenis_pengajuan"))
                ->get();

            $pengajuan_skw = PengajuanSKW::with(['AnggotaKeluarga'])
                ->select('*', DB::raw("'Pengajuan SKW' as jenis_pengajuan"))
                ->get();


            $data = $pengajuan_kk
                ->concat($pengajuan_ktp)
                ->concat($pengajuan_akta)
                ->concat($pengajuan_sktm)
                ->concat($pengajuan_skbm)
                ->concat($pengajuan_skjd)
                ->concat($pengajuan_skkb)
                ->concat($pengajuan_skl)
                ->concat($pengajuan_skm)
                ->concat($pengajuan_skw)
                ->sortByDesc('created_at')
                ->values();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('pengajuan.index');
    }

    public function store(Request $request)
    {
        if ($request->input('tujuan') === 'kk') {
            $exists = PengajuanKK::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw') && $request->hasFile('kk') && $request->hasFile('ktp')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');
                    $kk = $request->file('kk')->store('public/files');
                    $ktp = $request->file('ktp')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'kk', 'ktp', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['kk'] = $kk;
                    $data['ktp'] = $ktp;
                    $data['status'] = 'proses';

                    PengajuanKK::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'ktp') {
            $exists = PengajuanKTP::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw') && $request->hasFile('kk')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');
                    $kk = $request->file('kk')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'kk', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['kk'] = $kk;
                    $data['status'] = 'proses';

                    PengajuanKTP::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'sktm') {
            $exists = PengajuanSKTM::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKTM::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'akta') {
            $exists = PengajuanAkta::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw') && $request->hasFile('surat_bidan')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');
                    $surat_bidan = $request->file('surat_bidan')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'surat_bidan', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['surat_bidan'] = $surat_bidan;
                    $data['status'] = 'proses';

                    PengajuanAkta::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'skm') {
            $exists = PengajuanSKM::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKM::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'skl') {
            $exists = PengajuanSKL::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKL::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'skw') {
            $exists = PengajuanSKW::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKW::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'skkb') {
            $exists = PengajuanSKKB::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKKB::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'skbm') {
            $exists = PengajuanSKBM::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKBM::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        } else if ($request->input('tujuan') === 'skjd') {
            $exists = PengajuanSKJD::where('anggota_id', $request->input('anggota_id'))->where('status', 'proses')->exists();
            if (!$exists) {
                if ($request->hasFile('pengantar_rw')) {
                    $pengantar_rw = $request->file('pengantar_rw')->store('public/files');

                    $data = $request->except(['pengantar_rw', 'tujuan']);
                    $data['pengantar_rw'] = $pengantar_rw;
                    $data['status'] = 'proses';

                    PengajuanSKJD::create($data);
                } else {
                    return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
                }
            } else {
                return redirect()->back()->with('error', 'Anda memiliki pengajuan yang belum terselesaikan');
            }
        }

        return redirect()->back()->with('success', 'Permintaan anda akan kami proses');
    }
}
