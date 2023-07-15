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

class PengajuanController extends Controller
{
    public function index()
    {
        return view('pengajuan');
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
