<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;
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
}
