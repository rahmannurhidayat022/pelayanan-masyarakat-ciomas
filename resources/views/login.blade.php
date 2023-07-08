@extends('layouts.landing')
@section('content')
@section('title-page', 'Pemerintahan Desa Ciomas')
<section class="wrapper">
    <div class="container-fluid">
        <div class="container">
            <div class="card overflow-hidden mx-auto mt-5" style="max-width: 350px;">
                <div class="card-body">
                    <div class="w-100 d-flex justify-content-center align-items-center mb-4 mt-2">
                        <a href="{{ route('landing') }}">
                            <img width="80" src="{{ asset('assets/images/ciamis_logo.png') }}" alt="ciamis logo">
                        </a>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="mt-4 mb-3">
                            <button type="submit" class="btn btn-primary w-100">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('landing_script')
<script>
    console.log(window.location)
</script>
@endpush
@endsection
