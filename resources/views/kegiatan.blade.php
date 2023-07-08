@extends('layouts.landing')
@section('content')
@section('title-page', 'Kegiatan Desa Ciomas')
<section class="wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="card overflow-hidden mx-auto" style="max-width: 700px; border: none">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">
                            <a href="/kegiatan/1" class="row article">
                                <div class="col-4">
                                    <div class="article-img">
                                        <img src="https://images.unsplash.com/photo-1688678991304-ec82060848ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1332&q=80" alt="title article">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="article-text">
                                        <h3 class="h6 mt-0">Pesaing Baru Tweeter, Elon Mask Ketar Ketir!</h3>
                                        <small>27 Juli 2022</small>
                                        <p>Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et culpa duis.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="" class="row article">
                                <div class="col-4">
                                    <div class="article-img">
                                        <img src="https://images.unsplash.com/photo-1688678991304-ec82060848ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1332&q=80" alt="title article">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="article-text">
                                        <h3 class="h6 mt-0">Pesaing Baru Tweeter, Elon Mask Ketar Ketir!</h3>
                                        <small>27 Juli 2022</small>
                                        <p>Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et culpa duis.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link">Sebelumnya</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Selanjutnya</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@push('landing_script')
@endpush
@endsection
