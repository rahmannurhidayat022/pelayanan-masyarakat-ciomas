@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <div class="container-lg">
                    <a class="btn btn-secondary mb-3" href="{{ route('kegiatan.index') }}">Kembali</a>
                    <h2 class="h3 mb-2">{{ $data->title }}</h2>
                    <img class="img-fluid mb-4" src="{{ asset('storage/files/'.$data->image) }}" alt="">
                    <p>{{ $data->content }}</p>
                    <div class="d-flex align-items-center gap-1">
                        <i class="fa fa-solid fa-clock" width="12"></i>
                        {{ $data->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
@endpush
@endsection
