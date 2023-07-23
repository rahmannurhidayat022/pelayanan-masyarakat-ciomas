<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduan');
    }

    public function store(Request $request)
    {
        try {
            $nik = AnggotaKeluarga::where('nik', $request->nik)->first();
            if ($nik) {
                if ($request->image) {
                    $file = basename($request->file('image')->store('public/files'));
                    $data = $request->except(['image']);
                    $data["image"] = $file;
                    Pengaduan::create($data);
                } else {
                    Pengaduan::create($request->all());
                }
                return redirect()->back()->with('success', 'Terimakasih atas laporan Anda, akan kami segera proses');
            } else {
                return redirect()->back()->with('error', 'NIK Anda belum terdaftar di sistem desa');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Server error');
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengaduan::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('pengaduan.index');
    }

    public function changeIsRead($id)
    {
        $data = Pengaduan::findOrFail($id);
        $data->is_read = 'true';
        $data->update();

        return redirect()->back()->with('success', 'Pengaduan sudah terbaca');
    }

    public function destroy($id)
    {
        Pengaduan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pengaduan berhasil terhapus');
    }
}
