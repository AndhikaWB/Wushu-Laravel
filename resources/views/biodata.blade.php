<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biodata Anggota Wushu Naga Mas Lampung</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
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
              <h1>Biodata Anggota Wushu Naga Mas Lampung</h1>
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
                    Tambah Biodata Anggota
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Nama Wali</th>
                        <th>Nomor Hp</th>
                        <th>Nomor Hp Wali</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Paijo</td>
                        <td>bejo
                        </td>
                        <td>081916767555</td>
                        <td> 08977625257</td>
                        <td>Kampung Baru</td>
                        <td>Aktif</td>
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
                              <h4 class="modal-title">Edit Biodata Anggota</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama" placeholder=" Nama Anggota">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Wali</label>
                                    <input type="text" class="form-control" name="wali" placeholder=" Nama Wali">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor Hp</label>
                                    <input type="number" class="form-control" name="nohp" placeholder=" Nomor Hp">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor Hp Wali</label>
                                    <input type="number" class="form-control" name="nowali" placeholder=" Nomor Hp Wali">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder=" Alamat">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Status</label>
                                    <input type="text" class="form-control" name="status" placeholder=" status">
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
                              <h4 class="modal-title">Hapus Biodata</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Apakah Anda Ingin Menghapus Biodata ini?</label>
                                    <input type="text" class="form-control" name="namalomba" placeholder="Nama Anggota">
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
    </footer>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Biodata Anggota</h4>
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
                  <label for="exampleInputPassword1">Nama Wali</label>
                  <input type="text" class="form-control" name="wali" placeholder="Masukan Nama Wali">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Hp</label>
                  <input type="number" class="form-control" name="nohp" placeholder="Masukan Nomor Hp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Hp Wali</label>
                  <input type="number" class="form-control" name="nowali" placeholder="Masukan Nomor Hp Wali">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <input type="text" class="form-control" name="status" placeholder="Masukan status">
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
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
  <!-- jQuery -->

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
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