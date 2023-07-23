@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Manage pengaduan masyarakat</h2>
                <table id="pengaduan-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>No Telepon</th>
                            <th>Pesan</th>
                            <th>Tanggal pengaduan</th>
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
    const pengajuanTable = $('#pengaduan-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('pengaduan.index') }}",
        },
        columns: [{
                data: 'nik',
                name: 'nik',
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'judul',
                name: 'judul',
            },
            {
                data: 'telp',
                name: 'telp',
            },
            {
                data: 'pesan',
                name: 'pesan',
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
                <form class="d-inline" action="/pengaduan/list/${row.id}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary btn-sm" ${row.is_read === 'true' ? 'disabled' : ''}><i class="fa fa-eye"></i></button>
                </form>
                <form class="d-inline" action="/pengaduan/list/${row.id}/destroy" method="POST">
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
