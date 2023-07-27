@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Artikel Kegiatan Desa</h2>
                <a class="btn btn-primary mb-3" href="/admin/kegiatan/create">Tambah</a>
                <table id="kegiatan-table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Dibuat</th>
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
    const pengajuanTable = $('#kegiatan-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('kegiatan.index') }}",
        },
        columns: [{
                data: 'title',
                name: 'title',
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: null,
                name: null,
                orderable: false,
                render: (data, type, row) => {
                    return `
                <a href="/admin/kegiatan/${row.slug}/preview" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                <a href="/admin/kegiatan/${row.id}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <form class="d-inline" action="/admin/kegiatan/${row.id}/destroy" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" value="${row.jenis_pengajuan}" name="jenis_surat" hidden>
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
