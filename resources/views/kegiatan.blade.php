@extends('layouts.landing')
@section('content')
@section('title-page', 'Kegiatan Desa Ciomas')
<section class="wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="card overflow-hidden mx-auto" style="max-width: 700px; border: none">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('landing') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List Kegiatan</li>
                        </ol>
                    </nav>
                    <div class="row mb-4">
                        @foreach ($data as $item)
                        <div class="col-12">
                            <a href="{{ '/kegiatan/'.$item->slug}}" class="row article">
                                <div class="col-4">
                                    <div class="article-img">
                                        <img src="{{ asset('storage/files/'.$item->image) }}" alt="{{ $item->title }}">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="article-text">
                                        <h3 class="h6 mt-0">{{ $item->title }}</h3>
                                        <small>{{ $item->created_at }}</small>
                                        <p>{{ $item->content }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    {{ $data->links() }}
                    <!-- <nav aria-label="Page navigation example"> -->
                    <!--     <ul class="pagination justify-content-center"> -->
                    <!--         <li class="page-item disabled"> -->
                    <!--             <a class="page-link">Sebelumnya</a> -->
                    <!--         </li> -->
                    <!--         <li class="page-item"><a class="page-link" href="#">1</a></li> -->
                    <!--         <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                    <!--         <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                    <!--         <li class="page-item"> -->
                    <!--             <a class="page-link" href="#">Selanjutnya</a> -->
                    <!--         </li> -->
                    <!--     </ul> -->
                    <!-- </nav> -->
                </div>
            </div>
        </div>
    </div>
</section>
@push('landing_script')
@endpush
@endsection
