<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Lomba</title>

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
  @include('layouts.navbar')
  @include('layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Lomba</h1>
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
                  Tambah Lomba
                </button>
              </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Lomba</th>
                    <th>Tingkatan</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Wushu Tahunan
                    </td>
                    <td> Nasional</td>
                    <td>Kampung Baru</td>
                    <td>Belum di seleksi</td>
                    <td>
                      <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">
                        Edit
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus">
                        Hapus
                      </button>
                      <a href="kategori.html" class="btn btn-primary">Daftar Peserta</a> -->
                      <div class="btn-group">
                        <button type="button" class="btn btn-success btn-flat">Aksi</button>
                        <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-edit">Edit</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-hapus">Hapus</a>
                          <a class="dropdown-item" href="kategori_lomba.html">Daftar Kategori</a>
                          <a class="dropdown-item" href="peserta_lomba.html">Daftar Peserta</a> 
                        </div>
                      </div>
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-edit">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Lomba</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lomba</label>
                                <input type="text" class="form-control" name="namalomba" placeholder="Nama Lomba">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Kategori Lomba</label>
                                <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tingkatan</label>
                                <input type="text" class="form-control" name="tingkatan" placeholder="Tingkatan">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <input type="text" class="form-control" name="status" placeholder="Status">
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
                          <h4 class="modal-title">Hapus Data Lomba</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Apakah Anda Ingin Menghapus Lomba?</label>
                                <input type="text" class="form-control" name="namalomba" placeholder="Nama Lomba">
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
  



  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Lomba</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Lomba</label>
                <input type="text" class="form-control" name="namalomba" placeholder="Masukan Nama Lomba">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kategori Lomba</label>
                <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tingkatan</label>
                <input type="text" class="form-control" name="tingkatan" placeholder="Masukan Tingkatan">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Lokasi</label>
                <input type="text" class="form-control" name="lokasi" placeholder="Masukan Lokasi">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <input type="text" class="form-control" name="status" placeholder="Masukan Status">
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
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
