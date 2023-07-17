@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h2 class="h4 mb-4">Manage pengajuan surat</h2>
                <div class="d-flex gap-2">
                    <div class="mb-3">
                        <label class="form-label" for="jenis_surat">Jenis Pengajuan</label>
                        <select class="form-control" id="jenis_surat" name="jenis_surat">
                            <option value="">Semua</option>
                            <option value="Pengajuan KK">Pengajuan KK</option>
                            <option value="Pengajuan KTP">Pengajuan KTP</option>
                            <option value="Pengajuan Akta">Pengajuan Akta</option>
                            <option value="Pengajuan SKTM">Pengajuan SKTM</option>
                            <option value="Pengajuan SKBM">Pengajuan SKBM</option>
                            <option value="Pengajuan SKJD">Pengajuan SKJD</option>
                            <option value="Pengajuan SKKB">Pengajuan SKKB</option>
                            <option value="Pengajuan SKL">Pengajuan SKL</option>
                            <option value="Pengajuan SKM">Pengajuan SKM</option>
                            <option value="Pengajuan SKW">Pengajuan SKW</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Status Surat</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Semua</option>
                            <option value="proses">Proses</option>
                            <option value="ditolak">Ditolak</option>
                            <option value="disetujui">Disetujui</option>
                        </select>
                    </div>
                </div>
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
    const pengajuanTable = $('#pengajuan-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('pengajuan.index') }}",
            data: function(d) {
                d.jenis_pengajuan = $('#jenis_surat').val();
                d.status = $('#status').val();
            }
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
                render: (data, type, row) => {
                    let variant = 'text-secondary';
                    if (data === "proses") {
                        variant = 'text-primary'
                    } else if (data === "disetujui") {
                        variant = 'text-success'
                    } else if (data === "ditolak") {
                        variant = 'text-danger'
                    }

                    return `<span class="${variant}">${data}</span>`
                }
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
                <a href="/pengajuan-surat/manage-pengajuan-surat/${row.id}?jenis_surat=${row.jenis_pengajuan}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                <form class="d-inline" action="/pengajuan-surat/${row.id}/destroy" method="POST">
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

    $('#jenis_surat').on('change', function() {
        pengajuanTable.column(2).search($(this).val()).draw();
    });
    $('#status').on('change', function() {
        pengajuanTable.column(3).search($(this).val()).draw();
    });
</script>
@endpush
@endsection
