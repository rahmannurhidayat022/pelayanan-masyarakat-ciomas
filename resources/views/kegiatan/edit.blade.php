@extends('layouts.dashboard')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kegiatan.index')}}">Kegiatan Desa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h2 class="h4 mb-4">Edit Artikel Kegiatan Desa</h2>
                <form action="{{ route('kegiatan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="image_path" value="{{ $data->image }}" hidden>
                    <div class="mb-3">
                        <label class="form-label" for="title">Judul</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ $data->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Image Cover</label><br />
                        <img class="mb-2" height="150" src="{{ asset('storage/files/'.$data->image) }}" alt="{{ $data->title }}">
                        <input class="form-control" id="image" name="image" type="file">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">Konten</label>
                        <textarea class="form-control" id="content" name="content" required>
                        {{ $data->content }}
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
@endpush
@endsection
