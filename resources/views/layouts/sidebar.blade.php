<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-blue elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Wushu Naga Mas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/march.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $username }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/anggota') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Daftar Anggota
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="Jadwal Ujian.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal Ujian
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="Jadwal Kegiatan.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal Kegiatan Umum
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="Daftar Lomba.html" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Daftar Lomba
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('/biodata') }} class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Biodata
                        </p>
                    </a>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>