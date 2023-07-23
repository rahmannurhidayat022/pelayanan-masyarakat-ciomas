@extends('layouts.landing')
@section('content')
@section('title-page', 'Pengaduan Desa Ciomas')
<section class="wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="card overflow-hidden mx-auto" style="max-width: 700px;">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('public.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="telp">No Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pesan">Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Berkas</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mt-4">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('landing_script')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
    })
</script>
@endpush
@endsection
