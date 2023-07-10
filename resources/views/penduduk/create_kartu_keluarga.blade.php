@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('penduduk.index')}}">Data Kependudukan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kartu Keluarga</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <h2 class="h4 mb-4">Tambah Data Kartu Keluarga</h2>
                <form action="{{ route('penduduk.store_kartu_keluarga') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="no_kk">No KK</label>
                                <input type="number" value="{{ old('no_kk')}}" class="form-control form-w-sm" id="no_kk" name="no_kk" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="kepala_keluarga">Kepala Keluarga</label>
                                <input type="text" value="{{ old('kepala_keluarga')}}" class="form-control form-w-sm" id="kepala_keluarga" name="kepala_keluarga" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="rt_rw">RT/RW</label>
                                <input type="text" value="{{ old('rt_rw')}}" class="form-control form-w-sm" id="rt_rw" name="rt_rw" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control form-w-sm" id="alamat" name="alamat" required>
                                {{ old('alamat') }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary ms-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
