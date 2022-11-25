<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-blue elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Wushu Naga Mas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/march.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('biodata') }}" class="d-block">{{ $username }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('anggota') }}" class="nav-link {{ Route::is('anggota') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Daftar Anggota
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('ujian') }}" class="nav-link {{ Route::is('ujian') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal Ujian
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('kegiatan') }}" class="nav-link {{ Route::is('kegiatan') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal Kegiatan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('lomba') }}" class="nav-link {{ Route::is('lomba') || Route::is('peserta*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Daftar Lomba & Peserta
                        </p>
                    </a>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>