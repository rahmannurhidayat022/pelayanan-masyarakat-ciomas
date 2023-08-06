<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">
    @include('includes.dashboard_head')
    @stack('head')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('landing') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>MIMIN DESA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <i class="fa fa-user fs-2"></i>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-handshake me-2"></i>Pelayanan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('pengajuan.index') }}" class="dropdown-item">Pengajuan Surat</a>
                            <a href="{{ route('pengaduan.index') }}" class="dropdown-item">Pengaduan Masyarakat</a>
                        </div>
                    </div>
                    <a href="{{ route('kegiatan.index') }}" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Kegiatan Desa</a>
                    <a href="{{ route('penduduk.index') }}" class="nav-item nav-link {{ Route::currentRouteName() === 'penduduk.index' ? 'active' : '' }}"><i class="fa fa-address-card me-2"></i>Data Penduduk</a>
                    <a href="{{ route('account.index') }}" class="nav-item nav-link {{ Route::currentRouteName() === 'account.index' ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Manajemen Akun</a>
                </div>
            </nav>
        </div>

        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user fs-6 me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            @yield('content')

            <div class="container-fluid pt-4 px-4">
                <div class="w-100 bg-light rounded-top p-2">
                    <p class="p-0 m-0 text-center"> &copy; <a href="{{ route('landing') }}">Website Desa Ciomas</a>, All Right Reserved.</p>
                </div>
            </div>
        </div>


        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <div id="notif" class="notif {{ session('success') ? 'show' : (session('error') ? 'show' : '') }}">
        <div class="card">
            <div class="card-body">
                <div class="w-100 d-flex justify-content-center align-items-center p-3">
                    @if (session('success'))
                    <svg class="notif-icon icon-success" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                    </svg>
                    @else
                    <svg class="notif-icon icon-error" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                    </svg>
                    @endif
                </div>
                <p class="text-center">
                    @if(session('success'))
                    {{ session('success') }}
                    @elseif (session('error'))
                    {{ session('error') }}
                    @else
                    Message tidak ada
                    @endif
                </p>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @include('includes.dashboard_script')
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5'
        });
        $('#notif button').click(function() {
            $('#notif').removeClass('show');
        })
    </script>
    @stack('script')
</body>

</html>
