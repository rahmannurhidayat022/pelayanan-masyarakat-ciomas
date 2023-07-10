@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('penduduk.index')}}">Data Kependudukan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Anggota Keluarga</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h2 class="h4 mb-4">Edit Data Anggota Keluarga</h2>
                <form action="{{ route('penduduk.update_anggota_keluarga', ['id' => $id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="kk_id">Kartu Keluarga</label>
                                <select class="select2 form-control form-w-sm" id="kk_id" name="kk_id" required></select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="nik">NIK</label>
                                <input type="number" value="{{ $data->nik }}" class="form-control form-w-sm" id="nik" name="nik" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" value="{{ $data->nama }}" class="form-control form-w-sm" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="jenis_kelamin">Jenis kelamin</label>
                                <select class="form-control form-w-sm" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih</option>
                                    <option value="laki-laki" {{ $data->jenis_kelamin === 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="perempuan" {{ $data->jenis_kelamin === 'perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" value="{{ $data->tempat_lahir }}" class="form-control form-w-sm" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" value="{{ $data->tanggal_lahir }}" class="form-control form-w-sm" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="agama">Agama</label>
                                <select class="form-control form-w-sm" id="agama" name="agama" required>
                                    <option value="">Pilih</option>
                                    <option value="Islam" {{ $data->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ $data->agama === 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ $data->agama === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ $data->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ $data->agama === 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ $data->agama === 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pendidikan">Pendidikan</label>
                                <select class="form-control form-w-sm" id="pendidikan" name="pendidikan" required>
                                    <option value="">Pilih</option>
                                    <option value="SD Sederajat" {{ $data->pendidikan === 'SD Sederajat' ? 'selected' : '' }}>Sekolah Dasar (SD) / Sederajat</option>
                                    <option value="SMP Sederajat" {{ $data->pendidikan === 'SMP Sederajat' ? 'selected' : '' }}>Sekolah Menuju Pertama (SMP) / Sederajat</option>
                                    <option value="SMA Sederajat" {{ $data->pendidikan === 'SMA Sederajat' ? 'selected' : '' }}>Sekolah Menuju Atas (SMA) / Sederajat</option>
                                    <option value="Strata 1" {{ $data->pendidikan === 'Strata 1' ? 'selected' : '' }}>Strata 1 (S1)</option>
                                    <option value="Strata 2" {{ $data->pendidikan === 'Strata 2' ? 'selected' : '' }}>Strata 2 (S2)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" value="{{ $data->pekerjaan }}" class="form-control form-w-sm" id="pekerjaan" name="pekerjaan" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="status_pernikahan">Status Pernikahan</label>
                                <select class="form-control form-w-sm" id="status_pernikahan" name="status_pernikahan" required>
                                    <option value="">Pilih</option>
                                    <option value="Belum Nikah" {{ $data->status_pernikahan === 'Belum Nikah' ? 'selected' : '' }}>Belum Nikah</option>
                                    <option value="Sudah Menikah" {{ $data->status_pernikahan === 'Sudah Menikah' ? 'selected' : '' }}>Sudah Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="status_hubungan">Status Hubungan</label>
                                <select class="form-control form-w-sm" id="status_hubungan" name="status_hubungan" required>
                                    <option value="">Pilih</option>
                                    <option value="Kepala Keluarga" {{ $data->status_hubungan === 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                    <option value="Istri" {{ $data->status_hubungan === 'Istri' ? 'selected' : '' }}>Istri</option>
                                    <option value="Anak" {{ $data->status_hubungan === 'Anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <select class="form-control form-w-sm" id="kewarganegaraan" name="kewarganegaraan" required>
                                    <option value="">Pilih</option>
                                    <option value="WNI" {{ $data->kewarganegaraan === 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia (WNI)</option>
                                    <option value="WNA" {{ $data->kewarganegaraan === 'WNA' ? 'selected' : '' }}>Warga Negara Asing (WNA)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="no_paspor">No Paspor</label>
                                <input type="number" value="{{ $data->no_paspor }}" class="form-control form-w-sm" id="no_paspor" name="no_paspor">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="no_kitas">No KITAS/KITAP</label>
                                <input type="number" value="{{ $data->no_kitas }}" class="form-control form-w-sm" id="no_kitas" name="no_kitas">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" value="{{ $data->nama_ayah }}" class="form-control form-w-sm" id="nama_ayah" name="nama_ayah" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" value="{{ $data->nama_ibu }}" class="form-control form-w-sm" id="nama_ibu" name="nama_ibu" required>
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
@push('script')
<script>
    $.ajax({
        url: "{{ route('penduduk.select2KartuKeluarga') }}",
        method: 'GET',
        dataType: 'json',
        success: (response) => {
            let html = '<option selected>Pilih</option>';
            $.each(response, function(index, data) {
                let selected = '';
                if (data.id == '{{ $data->kk_id }}') {
                    selected = 'selected';
                }
                html += `<option value="${data.id}" ${selected}>${data.no_kk} / ${data.kepala_keluarga}</option>`;
            });
            $('#kk_id').html(html);
        }
    })
</script>
@endpush
@endsection
