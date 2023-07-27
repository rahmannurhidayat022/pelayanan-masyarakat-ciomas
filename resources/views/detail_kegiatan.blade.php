@extends('layouts.landing')
@section('content')
@section('title-page', 'Kegiatan Desa Ciomas')
<section class="wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="card overflow-hidden mx-auto" style="max-width: 700px; border: none">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('public.kegiatan') }}">Kembali</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->slug }}</li>
                        </ol>
                    </nav>
                    <h3 class="h4 mt-0">{{ $data->title }}</h3>
                    <div class="d-flex align-items-center gap-1 mb-3">
                        <i class="fa fa-solid fa-clock" width="12"></i>
                        {{ $data->created_at }}
                    </div>
                    <img class="img-fluid" src="{{ asset('storage/files/'.$data->image) }}" alt="title article">
                    <p class="py-3">{{ $data->content }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@push('landing_script')
@endpush
@endsection
