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

    public function select2KartuKeluarga()
    {
        $data = KartuKeluarga::select('id', 'no_kk', 'kepala_keluarga')->get();
        return response()->json($data);
    }

    public function select2AnggotaKeluarga()
    {
        $data = AnggotaKeluarga::select('id', 'nik', 'nama')->get();
        return response()->json($data);
    }

    public function createAnggotaKeluarga()
    {
        return view('penduduk.create_anggota_keluarga');
    }

    public function storeAnggotaKeluarga(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nik' => 'required|unique:anggota_keluarga',
            'kk_id' => 'required|exists:kartu_keluarga,id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_pernikahan' => 'required',
            'status_hubungan' => 'required',
            'kewarganegaraan' => 'required',
            'no_paspor' => 'nullable',
            'no_kitas' => 'nullable',
            'nama_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
        ]);

        if ($validated->fails()) {
            $errors = $validated->errors();
            return redirect()->back()->with('error', $errors->first())->withInput($request->all());
        }

        try {
            $anggotaKeluarga = AnggotaKeluarga::create($request->all());
            $anggotaKeluarga->save();

            return redirect()->route('penduduk.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            return redirect()->route('penduduk.index')->with('error', 'Gagal menambahkan data');
        }
    }

    public function editAnggotaKeluarga($id)
    {
        $data = AnggotaKeluarga::findOrFail($id);
        return view('penduduk.edit_anggota_keluarga', compact('id'), compact('data'));
    }

    public function updateAnggotaKeluarga(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'nik' => ['nullable', function ($attribute, $value, $fail) use ($id) {
                $anak = AnggotaKeluarga::findOrFail($id);

                if ($anak->nik === $value) {
                    return;
                }

                $exists = AnggotaKeluarga::where('nik', $value)->where('id', '!=', $id)->exists();
                if ($exists) {
                    $fail('NIK telah digunakan');
                }
            }],
            'kk_id' => 'required|exists:kartu_keluarga,id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_pernikahan' => 'required',
            'status_hubungan' => 'required',
            'kewarganegaraan' => 'required',
            'no_paspor' => 'nullable',
            'no_kitas' => 'nullable',
            'nama_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
        ]);

        if ($validated->fails()) {
            $errors = $validated->errors();
            return redirect()->back()->with('error', $errors->first())->withInput($request->all());
        }

        try {
            $kk = AnggotaKeluarga::findOrFail($id);
            $kk->update($request->all());
            $kk->save();

            return redirect()->route('penduduk.index')->with('success', 'Berhasil memperbaharui data');
        } catch (\Throwable $th) {
            return redirect()->route('penduduk.index')->with('error', 'Gagal memperbaharui data');
        }
    }

    public function destroyAnggotaKeluarga($id)
    {
        try {
            AnggotaKeluarga::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
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
