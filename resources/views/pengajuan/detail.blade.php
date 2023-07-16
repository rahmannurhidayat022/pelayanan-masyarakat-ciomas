@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pengajuan.index') }}">List Pengajuan Surat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rincian</li>
                    </ol>
                </nav>
                <h2 class="h4 mb-4">Rincian Pengajuan Surat</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td colspan="3"><b>Identitas</b></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><b>{{ $data->AnggotaKeluarga->nama }}</b></td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl Lahir</td>
                            <td>:</td>
                            <td><b>{{ $data->AnggotaKeluarga->tempat_lahir }}, {{ $data->AnggotaKeluarga->tanggal_lahir }}</b></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><b>{{ $data->AnggotaKeluarga->jenis_kelamin }}</b></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><b>{{ $data->AnggotaKeluarga->agama }}</b></td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td>:</td>
                            <td><b>{{ $data->AnggotaKeluarga->status_pernikahan }}</b></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><b>{{ $data->AnggotaKeluarga->pekerjaan }}</b></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Rincian Pengajuan</b></td>
                        </tr>
                        <tr>
                            <td>Kategori Surat</td>
                            <td>:</td>
                            <td><b>{{ request()->query('jenis_surat') }}</b></td>
                        </tr>
                        @if ($data->jenis)
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td><b>{{ $data->jenis }}</b></td>
                        </tr>
                        @endif
                        @if ($data->kategori)
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><b>{{ $data->kategori }}</b></td>
                        </tr>
                        @endif
                        @if ($data->cerai)
                        <tr>
                            <td>Cerai</td>
                            <td>:</td>
                            <td><b>{{ $data->cerai }}</b></td>
                        </tr>
                        @endif
                        @if ($data->surat_bidan)
                        <tr>
                            <td>Surat Bidan</td>
                            <td>:</td>
                            <td><b>{{ $data->surat_bidan }}</b></td>
                        </tr>
                        @endif
                        @if ($data->penghasilan)
                        <tr>
                            <td>Penghasilan</td>
                            <td>:</td>
                            <td><b>Rp. {{ $data->penghasilan }}</b></td>
                        </tr>
                        @endif
                        @if ($data->nama_anak)
                        <tr>
                            <td>Nama Anak</td>
                            <td>:</td>
                            <td><b>{{ $data->nama_anak }}</b></td>
                        </tr>
                        @endif
                        @if ($data->nama_wali)
                        <tr>
                            <td>Nama Wali</td>
                            <td>:</td>
                            <td><b>{{ $data->nama_wali }}</b></td>
                        </tr>
                        @endif
                        @if ($data->tempat_lahir)
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td><b>{{ $data->tempat_lahir }}</b></td>
                        </tr>
                        @endif
                        @if ($data->tanggal_lahir)
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><b>{{ $data->tanggal_lahir }}</b></td>
                        </tr>
                        @endif
                        @if ($data->nama_pasangan)
                        <tr>
                            <td>Nama Pasangan</td>
                            <td>:</td>
                            <td><b>{{ $data->nama_pasangan }}</b></td>
                        </tr>
                        @endif
                        @if ($data->nama_ibu)
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><b>{{ $data->nama_ibu }}</b></td>
                        </tr>
                        @endif
                        @if ($data->nama_ayah)
                        <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td><b>{{ $data->nama_ayah }}</b></td>
                        </tr>
                        @endif
                        @if ($data->nik)
                        <tr>
                            <td>NIK Terkait</td>
                            <td>:</td>
                            <td><b>{{ $data->nik }}</b></td>
                        </tr>
                        @endif
                        @if ($data->alamat)
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><b>{{ $data->alamat }}</b></td>
                        </tr>
                        @endif
                        @if ($data->pengantar_rw)
                        <tr>
                            <td>Surat Pengantar RW</td>
                            <td>:</td>
                            <td>
                                <a href="{{ route('download', ['filename' => $data->pengantar_rw]) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-download me-1"></i>Unduh File</a>
                            </td>
                        </tr>
                        @endif
                        @if ($data->kk)
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>:</td>
                            <td><b>{{ $data->kk }}</b></td>
                        </tr>
                        @endif
                        @if ($data->ktp)
                        <tr>
                            <td>KTP</td>
                            <td>:</td>
                            <td><b>{{ $data->ktp }}</b></td>
                        </tr>
                        @endif
                        <tr>
                            <td>Status pengajuan</td>
                            <td>:</td>
                            <td><b>{{ $data->status }}</b></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary w-100 mb-1 mt-3" data-bs-toggle="modal" data-bs-target="#reply-surat" {{ $data->status !== 'proses' ? 'disabled' : '' }}>
                    <i class="fa fa-reply me-1"></i>
                    Submit Hasil Surat
                </button>
                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#reject-surat" {{ $data->status !== 'proses' ? 'disabled' : '' }}>
                    <i class="fa fa-eject me-1"></i>
                    Tolak pengajuan
                </button>
                <div id="reply-surat" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Submit Hasil Surat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label" for="no_surat">No Surat</label>
                                        <input class="form-control" type="text" id="no_surat" name="no_surat">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="file">File</label>
                                        <input class="form-control" type="file" id="file" name="file">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="reject-surat" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Penolakan Surat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="form-label" for="pesan">Alasan penolakan</label>
                                        <textarea class="form-control" type="text" id="no_surat" name="no_surat"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
</script>
@endpush
@endsection
