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
                            <th></th>
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
                            <th></th>
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
    const anggotaKeluargaTable = $('#penduduk-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('penduduk.index') }}",
            data: (res) => (console.log(res))
        },
        columns: [{
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: ''
            },
            {
                data: 'nik',
                name: 'nik'
            },
            {
                data: 'nama',
                name: 'nama',
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
                orderable: false,
                render: (data, type, row) => {
                    return `
                <a href="/penduduk/anggota-keluarga/${row.id}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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

    function anggotaKeluargaFormat(d) {
        return (
            '<dl>' +
            '<dt>Pendidikan:</dt>' +
            '<dd>' +
            d.pendidikan +
            '</dd>' +
            '</dd>' +
            '<dt>Pekerjaan:</dt>' +
            '<dd>' +
            d.pekerjaan +
            '</dd>' +
            '<dt>Status Pernikahan:</dt>' +
            '<dd>' +
            d.status_pernikahan +
            '</dd>' +
            '<dt>Status Hubungan:</dt>' +
            '<dd>' +
            d.status_hubungan +
            '</dd>' +
            '<dt>Kewarganegaraan:</dt>' +
            '<dd>' +
            d.kewarganegaraan +
            '</dd>' +
            '<dt>No Paspor:</dt>' +
            '<dd>' +
            d.no_paspor +
            '</dd>' +
            '<dt>No KITAS/KITAP:</dt>' +
            '<dd>' +
            d.no_kitas +
            '</dd>' +
            '<dt>Nama Ayah:</dt>' +
            '<dd>' +
            d.nama_ayah +
            '</dd>' +
            '<dt>Nama Ibu:</dt>' +
            '<dd>' +
            d.nama_ibu +
            '</dd>' +
            '<dt>Tanggal dicatat oleh sistem:</dt>' +
            '<dd>' +
            d.created_at +
            '</dd>'
        );
    }

    anggotaKeluargaTable.on('click', 'td.dt-control', function(e) {
        let tr = e.target.closest('tr');
        let row = anggotaKeluargaTable.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
        } else {
            row.child(anggotaKeluargaFormat(row.data())).show();
        }
    });

    const kkTable = $('#kartu-keluarga-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('penduduk.getKartuKeluarga') }}",
            data: (res) => (console.log(res))
        },
        columns: [{
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: ''
            },
            {
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
                orderable: false,
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

    function kkFormat(d) {
        return (
            '<dl>' +
            '<dt>RT/RW:</dt>' +
            '<dd>' +
            d.rt_rw +
            '</dd>' +
            '</dd>' +
            '<dt>Desa/kelurahan:</dt>' +
            '<dd>' +
            d.desa +
            '</dd>' +
            '<dt>Kecamatan:</dt>' +
            '<dd>' +
            d.kecamatan +
            '</dd>' +
            '<dt>Kabupaten/Kota:</dt>' +
            '<dd>' +
            d.kabupaten +
            '</dd>' +
            '<dt>Kode Pos:</dt>' +
            '<dd>' +
            d.kode_pos +
            '</dd>' +
            '<dt>Provinsi:</dt>' +
            '<dd>' +
            d.provinsi +
            '</dd>' +
            '<dt>Tanggal dicatat oleh sistem:</dt>' +
            '<dd>' +
            d.created_at +
            '</dd>'
        );
    }

    kkTable.on('click', 'td.dt-control', function(e) {
        let tr = e.target.closest('tr');
        let row = kkTable.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
        } else {
            row.child(kkFormat(row.data())).show();
        }
    });
</script>
@endpush
@endsection
