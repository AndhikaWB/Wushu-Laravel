<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Anggota</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="Login Page.html" class="nav-link">Logout</a>
        </li>

      </ul>
    </nav>
  <!-- /.navbar -->

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
          <a href="#" class="d-block">Rian Dika Erlangga</a>
        </div>
      </div>
 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{ url('/home') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ url('/anggota') }}" class="nav-link active">
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
          Jadwal Kegiatan
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
      <a href="{{ url('/biodata') }}" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Biodata
        </p>
      </a>
    </li>

     
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Anggota Wushu Naga Mas Lampung</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Tambah Data Anggota
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Sabuk</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Prestasi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Suparjo</td>
                    <td>Pelatih
                    </td>
                    <td>Hitam</td>
                    <td> 4 agustus 1978</td>
                    <td>Kampung Baru</td>
                    <td>pernah Gulad ama beruang</td>
                    <td>
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">
                        Edit
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus">
                        Hapus
                      </button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dokumen">
                        Dokumen
                      </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-edit">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Anggota</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Anggota">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Warna Sabuk</label>
                                <input type="text" class="form-control" name="sabuk" placeholder="warna sabuk">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl" placeholder="tanggal lahir">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Prestasi</label>
                                <input type="text" class="form-control" name="prestasi" placeholder="Prestasi">
                              </div>
                            </div>
                            <!-- /.card-body -->
              
                            <div class="card-footer">
                              <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                          </form>
                        </div>
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <div class="modal fade" id="modal-hapus">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Apakah Anda Ingin Menghapus Data?</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Anggota">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1"></label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
                              </div>

                            </div>
                            <!-- /.card-body -->
              
                            <div class="card-footer">
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                          </form>
                        </div>
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <div class="modal fade" id="modal-dokumen">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Dokumen Bersangkutan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                            Tambah Dokumen
                          </button>
                            
                        </div>
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Dokumen</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="#">
                            <input type="file" id="myFile" name="filename">
                            <input type="submit">
                          </form>
                            
                        </div>
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Anggota</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Anggota</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Anggota">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Warna Sabuk</label>
                  <input type="text" class="form-control" name="sabuk" placeholder="Masukan warna sabuk">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl" placeholder="Masukan tanggal lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Prestasi</label>
                  <input type="text" class="form-control" name="prestasi" placeholder="Masukan Prestasi">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

              <!-- jQuery -->
              <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
              <!-- jQuery UI 1.11.4 -->
              <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
              <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
              <script>
                $.widget.bridge('uibutton', $.ui.button)
              </script>
              <!-- Bootstrap 4 -->
              <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
              <!-- ChartJS -->
              <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
              <!-- Sparkline -->
              <script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
              <!-- JQVMap -->
              <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
              <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
              <!-- jQuery Knob Chart -->
              <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
              <!-- daterangepicker -->
              <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
              <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
              <!-- Tempusdominus Bootstrap 4 -->
              <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
              <!-- Summernote -->
              <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
              <!-- overlayScrollbars -->
              <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
              <!-- AdminLTE App -->
              <script src="{{ asset('dist/js/adminlte.js')}}"></script>
              <!-- AdminLTE for demo purposes -->
              <script src="{{ asset('dist/js/demo.js')}}"></script>
              <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
              <script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
              <!-- jQuery -->

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
