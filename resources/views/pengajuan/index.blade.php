@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Manage pengajuan surat</h2>
                <table id="pengajuan-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jenis Pengajuan</th>
                            <th>Status</th>
                            <th>Diajukan</th>
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
    const anggotaKeluargaTable = $('#pengajuan-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('pengajuan.index') }}",
            data: (res) => (console.log(res))
        },
        columns: [{
                data: 'anggota_keluarga.nama',
                name: 'anggota_keluarga.nama',
            },
            {
                data: 'anggota_keluarga.nik',
                name: 'anggota_keluarga.nik'
            },
            {
                data: 'jenis_pengajuan',
                name: 'jenis_pengajuan',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'created_at',
                name: 'created_at',
            },
            {
                data: null,
                name: null,
                orderable: false,
                render: (data, type, row) => {
                    return `
                <a href="/penduduk/anggota-keluarga/${row.id}/edit" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                <form class="d-inline" action="/penduduk/anggota-keluarga/${row.id}/destroy" method="POST">
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
