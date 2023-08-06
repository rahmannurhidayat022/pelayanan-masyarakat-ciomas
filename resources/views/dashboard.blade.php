@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-file-contract fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Pengajuan</p>
                    <h6 class="mb-0">{{ $totalPengajuan }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-bullhorn fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Pengaduan</p>
                    <h6 class="mb-0">{{ $totalPengaduan }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-address-card fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Penduduk</p>
                    <h6 class="mb-0">{{ $totalPenduduk }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-list fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Kegiatan</p>
                    <h6 class="mb-0">{{ $totalKegiatan }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-md-6">
            <div class="card bg-light" style="border: none">
                <div class="card-body">
                    <h2 class="h5 mb-3">Jumlah berdasarkan jenis pengajuan surat</h2>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipe Pengajuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($listPengajuan) > 0)
                                @foreach($listPengajuan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['jenis'] }}</td>
                                    <td>{{ $item['total'] }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex justify-content-center align-items-center gap-2 m-0 py-5" style="background-color: #e7e9ec">
                                            <i class="fas fa-box-open"></i>
                                            <span>Data Kosong</span>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card bg-light" style="border: none">
                <div class="card-body">
                    <h2 class="h5 mb-3">Pengaduan belum terbaca</h2>
                    @if (count($pengaduan) > 0)
                    @foreach($pengaduan as $item)
                    <div class="d-flex align-items-center gap-2">
                        <i class="fas fa-circle text-warning"></i>
                        <span>Terdapat pesan pengaduan dari <strong>{{ $item->nama }}</strong> pada <strong>{{ $item->created_at }}</strong>. <a href="{{ route('pengaduan.index') }}">Lihat selengkapnya</a></span>
                    </div>
                    @endforeach
                    @else
                    <div class="d-flex justify-content-center align-items-center gap-2 m-0 py-5" style="background-color: #e7e9ec">
                        <i class="fas fa-box-open"></i>
                        <span>Data Kosong</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
