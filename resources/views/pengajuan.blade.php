@extends('layouts.landing')
@section('content')
@section('title-page', 'Pengajuan Surat Desa Ciomas')
<section class="wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="card overflow-hidden mx-auto" style="max-width: 700px;">
                <div class="card-body">
                    <div class="alert alert-primary">
                        Pastikan agar data yang diisikan susuai ketentuan dan valid, kesalahan data berisiko keterlambatan pembuatan surat.
                    </div>
                    <form action="" method="">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label" for="tujuan">Tujuan Surat</label>
                                    <select class="select2 form-select" id="tujuan" name="tujuan" required>
                                        <option value="">Pilih</option>
                                        <option value="kk">Permohonan KK</option>
                                        <option value="ktp">Permohonan KTP</option>
                                        <option value="sktm">Surat Keterangan Tidak Mampu</option>
                                        <option value="akta">Surat Akta Kelahiran</option>
                                        <option value="skl">Surat Keterangan Lahir</option>
                                        <option value="skm">Surat Keterangan Menikah</option>
                                        <option value="skw">Surat Keterangan Wali</option>
                                        <option value="skkb">Surat Ketarangan Kelakuan Baik</option>
                                        <option value="skbm">Surat Keterangan Belum Menikah</option>
                                        <option value="skjd">Surat Keterangan Janda / Duda</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label" for="nik">NIK</label>
                                    <select class="select2 form-select w-100" id="nik" name="nik" required>
                                        <option value="">Pilih</option>
                                        <option value="ktp">KTP</option>
                                    </select>
                                    <small class="text-muted">NIK tidak tersedia? hubungi aparatur desa</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="form">
                            <div class="mb-3 d-none">
                                <label class="form-label" for="jenis">Jenis Pengajuan Kartu</label>
                                <select class="form-select" id="jenis" name="jenis" disabled required>
                                    <option value="">Pilih</option>
                                    <option value="baru">Buat Baru</option>
                                    <option value="pembaharuan">Pembaharuan Data</option>
                                </select>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" disabled required>
                                    <option value="">Pilih</option>
                                    <option value="janda">Janda</option>
                                    <option value="duda">Duda</option>
                                </select>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="cerai">Cerai</label>
                                <select class="form-select" id="cerai" name="cerai" disabled required>
                                    <option value="">Pilih</option>
                                    <option value="cerai_mati">Cerai Mati</option>
                                    <option value="cerai_hidup">Cerai Hidup</option>
                                </select>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="surat_bidan">Surat Bidan</label>
                                <input type="file" class="form-control" id="surat_bidan" name="surat_bidan" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="penghasilan">Penghasilan</label>
                                <input type="number" class="form-control" id="penghasilan" name="penghasilan" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="nama_anak">Nama Anak</label>
                                <input type="text" class="form-control" id="nama_anak" name="nama_anak" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="nama_wali">Nama Wali</label>
                                <input type="text" class="form-control" id="nama_wali" name="nama_wali" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="nama_pasangan">Nama Pasangan</label>
                                <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="nik">NIK (yang terkait)</label>
                                <input type="text" class="form-control" id="nik" name="nik" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" disabled required></textarea>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="pengantar_rw">Surat Pengantar RW</label>
                                <input type="file" class="form-control" id="pengantar_rw" name="pengantar_rw" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="kk">Kartu Keluarga</label>
                                <input type="file" class="form-control" id="kk" name="kk" disabled required>
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label" for="ktp">KTP</label>
                                <input type="file" class="form-control" id="ktp" name="ktp" disabled required>
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

        $('#tujuan').on('change', function() {
            const val = $(this).val();
            $('#form').find('[name]').each(function() {
                const tujuan = $('#tujuan').val();
                const name = $(this).attr('name');
                const $parent = $(this).parent();

                if (tujuan === 'kk' && ['jenis', 'pengantar_rw', 'kk', 'ktp'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'ktp' && ['jenis', 'pengantar_rw', 'kk'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'sktm' && ['pengantar_rw', 'penghasilan'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'akta' && ['pengantar_rw', 'nama_anak', 'tempat_lahir', 'tanggal_lahir', 'surat_bidan'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'skm' && ['pengantar_rw', 'nama_pasangan', 'nik', 'alamat'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'skl' && ['pengantar_rw', 'nama_anak', 'tempat_lahir', 'tanggal_lahir', 'nama_ayah', 'nama_ibu'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'skw' && ['pengantar_rw', 'nama_anak', 'nama_wali', 'tempat_lahir', 'tanggal_lahir'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'skkb' && ['pengantar_rw'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'skbm' && ['pengantar_rw'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else if (tujuan === 'skjd' && ['pengantar_rw', 'kategori', 'cerai', 'nama_pasangan', 'nik'].includes(name)) {
                    $(this).removeAttr('disabled');
                    $parent.removeClass('d-none');
                } else {
                    $(this).attr('disabled', 'disabled');
                    $parent.addClass('d-none');
                }
            })
        });
    })
</script>
@endpush
@endsection
