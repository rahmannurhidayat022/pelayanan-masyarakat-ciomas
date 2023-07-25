<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.')->withInput($request->only('username'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function accountList(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('akun.index');
    }

    public function store(Request $request)
    {
        try {
            $data = new User();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->role = $request->role;
            $data->password = Hash::make($request->password);
            $data->save();

            return redirect()->back()->with('success', 'Berhasil menambahkan akun');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Server error');
        }
    }

    public function edit($id)
    {
        try {
            $data = User::findOrFail($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            abort(400, 'Server error');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->name = $request->name;
            $data->role = $request->role;
            $data->username = $request->username;
            if ($request->password) {
                $data->password = Hash::make($request->password);
            }
            $data->update();
            return redirect()->back()->with('success', 'Data berhasil diperbaharui');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Data gagal diperbaharui');
        }
    }

    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus akun');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus akun');
        }
    }
}
