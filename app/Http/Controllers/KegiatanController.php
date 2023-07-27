<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function index()
    {
        $data = Kegiatan::paginate(5);
        return view('kegiatan', compact('data'));
    }

    public function detail($slug)
    {
        $data = Kegiatan::where('slug', $slug)->first();
        return view('detail_kegiatan', compact('data'));
    }

    public function adminIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = Kegiatan::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('kegiatan.index');
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        try {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Kegiatan::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $image = basename($request->file('image')->store('public/files'));
            $data = $request->except(['image']);
            $data['image'] = $image;
            $data['slug'] = $slug;
            Kegiatan::create($data);

            return redirect()->route('kegiatan.index')->with('success', 'Berhasil menambahkan artikel kegiatan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan artikel kegiatan');
        }
    }

    public function edit($id)
    {
        $data = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('data'));
    }

    public function preview($slug)
    {
        $data = Kegiatan::where('slug', $slug)->first();
        return view('kegiatan.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('image') && $request->image) {
                $image = basename($request->file('image')->store('public/files'));
            } else {
                $image = $request->image_path;
            }
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Kegiatan::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $slug = $slug;
            $data = $request->except(['image']);
            $data['image'] = $image;
            $data['slug'] = $slug;

            $kegiatan =  Kegiatan::findOrFail($id);
            $kegiatan->update($data);

            return redirect()->route('kegiatan.index')->with('success', 'Berhasil memperbaharui artikel kegiatan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbaharui artikel kegiatan');
        }
    }

    public function destroy($id)
    {
        Kegiatan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus artikel kegiatan');
    }
}
