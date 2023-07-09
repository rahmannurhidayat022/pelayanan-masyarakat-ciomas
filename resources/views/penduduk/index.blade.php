@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Data Kependudukan Desa Ciomas</h2>
                <div class="d-flex gap-2 mb-3">
                    <a href="{{ route('penduduk.create_anggota_keluarga') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table id="penduduk-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Agama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Data Kartu Keluarga</h2>
                <div class="d-flex gap-2 mb-3">
                    <a href="{{ route('penduduk.create_kartu_keluarga') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table id="kartu-keluarga-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $('#penduduk-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('penduduk.index') }}",
            data: (res) => (console.log(res))
        },
        columns: [{
                data: 'nik',
                name: 'nik'
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'jenis_kelamin',
                name: 'jenis_kelamin',
            },
            {
                data: 'tanggal_lahir',
                name: 'tanggal_lahir',
            },
            {
                data: 'tempat_lahir',
                name: 'tempat_lahir',
            },
            {
                data: 'agama',
                name: 'agama'
            },
            {
                data: null,
                name: null,
            }
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json"
        },
    })

    $('#kartu-keluarga-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('penduduk.getKartuKeluarga') }}",
            data: (res) => (console.log(res))
        },
        columns: [{
                data: 'no_kk',
                name: 'no_kk'
            },
            {
                data: 'kepala_keluarga',
                name: 'kepala_keluarga',
            },
            {
                data: 'alamat',
                name: 'alamat',
            },
            {
                data: null,
                name: null,
                render: (data, type, row) => {
                    return `
                <a href="/penduduk/kartu-keluarga/${row.id}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <form class="d-inline" action="/penduduk/kartu-keluarga/${row.id}/destroy" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
                `
                }
            }
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json"
        },
    })
</script>
@endpush
@endsection
