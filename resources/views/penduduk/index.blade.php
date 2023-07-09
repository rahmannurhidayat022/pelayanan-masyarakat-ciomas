@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Data Kependudukan Desa Ciomas</h2>
                <div class="d-flex gap-2 mb-3">
                    <a href="" class="btn btn-primary">Tambah</a>
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
    </div>
</div>

@push('script')
<script>
    $('#penduduk-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "",
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
</script>
@endpush
@endsection
