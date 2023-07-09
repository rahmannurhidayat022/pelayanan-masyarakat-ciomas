<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  AnggotaKeluarga::with(['kartuKeluarga'])->orderBy('created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('penduduk.index');
    }

    public function getKartuKeluarga()
    {
        $data = KartuKeluarga::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function createAnggotaKeluarga()
    {
        return view('penduduk.create_anggota_keluarga');
    }

    public function createKartuKeluarga()
    {
        return view('penduduk.create_kartu_keluarga');
    }

    public function storeKartuKeluarga(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'no_kk' => 'required|unique:kartu_keluarga',
            'kepala_keluarga' => 'required',
            'rt_rw' => 'required',
            'alamat' => 'required'
        ]);

        if ($validated->fails()) {
            $errors = $validated->errors();
            return redirect()->back()->with('error', $errors->first())->withInput($request->all());
        }

        try {
            $kk = KartuKeluarga::create($request->all());
            $kk->save();

            return redirect()->route('penduduk.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            return redirect()->route('penduduk.index')->with('error', 'Gagal menambahkan data');
        }
    }

    public function editKartuKeluarga($id)
    {
        $data = KartuKeluarga::findOrFail($id);
        return view('penduduk.edit_kartu_keluarga', compact('id'), compact('data'));
    }

    public function updateKartuKeluarga(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'no_kk' => ['nullable', function ($attribute, $value, $fail) use ($id) {
                $anak = KartuKeluarga::findOrFail($id);

                if ($anak->no_kk === $value) {
                    return;
                }

                $exists = KartuKeluarga::where('no_kk', $value)->where('id', '!=', $id)->exists();
                if ($exists) {
                    $fail('No KK telah digunakan');
                }
            }],
            'kepala_keluarga' => 'required',
            'rt_rw' => 'required',
            'alamat' => 'required'
        ]);

        if ($validated->fails()) {
            $errors = $validated->errors();
            return redirect()->back()->with('error', $errors->first())->withInput($request->all());
        }

        try {
            $kk = KartuKeluarga::findOrFail($id);
            $kk->update($request->all());
            $kk->save();

            return redirect()->route('penduduk.index')->with('success', 'Berhasil memperbaharui data');
        } catch (\Throwable $th) {
            return redirect()->route('penduduk.index')->with('error', 'Gagal memperbaharui data');
        }
    }

    public function destroyKartuKeluarga($id)
    {
        try {
            KartuKeluarga::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
