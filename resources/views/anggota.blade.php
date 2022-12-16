
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Anggota</title>

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
                  {{-- @foreach ($daftar_anggota as $a)
                      <button>{{$a->name}}</button>
                  @endforeach --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Username</th>
                        {{-- <th>Nama</th> --}}
                        <th>Jabatan</th>
                        <th>Sabuk</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($Biodata as $a)
                      <tr>
                        <td>{{ $a->username }}</td>
                        {{-- @foreach ($User as $b)
                            @if($b->username = $a->username)
                                <td>{{ $b->}}
                            @endif
                        @endforeach --}}
                        <td>{{ $a->is_admin ? 'Pelatih' : 'Anggota' }}</td>
                        <td>{{ $a->sabuk }}</td>
                        <td>{{ $a->tgl_lahir }}</td>
                        <td>{{ $a->alamat }}<td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-success btn-flat">Aksi</button>
                            <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-edit-{{ $a->username }}-{{ $a->username }}">Edit</a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-hapus-{{ $a->username }}-{{ $a->username }}">Hapus</a>
                              <a class="dropdown-item" href="{{ route('prestasi', ['Username' => $a->username]) }}">Prestasi</a>
                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-dokumen-{{ $a->username }}">Dokumen</a>
                              <a class="dropdown-item" href="{{ route('wali', ['Username' => $a->username]) }}">Data Wali</a>
                            </div>
                          </div>
                      </tr>
                    @endforeach

                    @foreach ($User as $datauser)
                    @foreach ($Biodata as $data)
                      <div class="modal fade" id="modal-edit-{{ $data->username }}-{{ $datauser->username }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Data {{$data->username}}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('anggota.update', ['Biodata' => $data->username]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                      <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name" value="{{$datauser->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" value="{{$data->username}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="{{$datauser->password}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Sabuk</label>
                                            <select name="sabuk" class="form-control">
                                            {{-- <input type="text" class="form-control" name="sabuk" value="{{$data->sabuk}}"> --}}
                                                <option value="{{$data->sabuk}}">{{$data->sabuk}}</option>
                                                <option value="Kuning">Kuning</option>
                                                <option value="Hijau">Hijau</option>
                                                <option value="Biru">Biru</option>
                                                <option value="Oranye">Oranye</option>
                                                <option value="Cokelat">Cokelat</option>
                                                <option value="Merah">Merah</option>
                                                <option value="Merah Hitam">Merah Hitam</option>
                                                <option value="Hitam">Hitam</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl" value="{{$data->tgl_lahir}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
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
                    @endforeach
                    @endforeach

                    @foreach ($User as $datauser)
                    @foreach ($Biodata as $data)
                      <div class="modal fade" id="modal-hapus-{{ $data->username }}-{{ $datauser->username }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('anggota.destroy', ['Biodata' => $data->username]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Apakah Anda Yakin Ingin Menghapus Data {{ $data->username }}?</label>
                                        <input type="hidden" class="form-control" id="hapus-username" name="username">
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
                    @endforeach
                    @endforeach

                    @foreach ($User as $datauser)
                      <!-- /.modal -->
                      <div class="modal fade" id="modal-dokumen-{{ $datauser->username }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Dokumen Bersangkutan {{ $datauser->username }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group d-flex">
                                        <ul>
                                        @foreach ($Dokumen as $item)
                                            @if($datauser->username == $item->username)
                                            <ol>
                                                <div>{{$item->kategori}}</div>
                                                <div class="ml-auto">
                                                    <a target="_blank" href="{{asset('file_upload')}}/{{$item->file}}"" class="btn btn-warning action-btn has-icon edit-btn">Lihat</a>
                                                    <a class="btn btn-danger text-white action-btn has-icon delete-btn" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">Hapus</a>
                                                </div>
                                            </ol>
                                            @endif
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <form action="{{ route('dokumen.store', ['Username' => $datauser->username]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Pilih File!</label><br>
                                            <input type="file" id="myFile" name="file">
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                                <select name="kategori" class="form-control">
                                                    <option value="KTP">KTP</option>
                                                    <option value="Akta Lahir">Akta Lahir</option>
                                                    <option value="Resume">Resume</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    @endforeach

                    @foreach ($Dokumen as $item)
                    <div class="modal fade" id="modal-delete-{{ $item->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus Dokumen</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('dokumen.destroy', ['Id' => $item->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Apakah Anda Yakin Ingin Menghapus Data {{$item->kategori}}?</label>
                                        <input type="hidden" class="form-control" id="hapus-username" name="username">
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
                      @endforeach

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
                <form action="{{ route('anggota.store') }}" method="POST">
                @csrf
                @method('POST')
                  <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama Anggota">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label>Sabuk</label>
                            <select name="sabuk" class="form-control">
                                <option value="Kuning">Kuning</option>
                                <option value="Hijau">Hijau</option>
                                <option value="Biru">Biru</option>
                                <option value="Oranye">Oranye</option>
                                <option value="Cokelat">Cokelat</option>
                                <option value="Merah">Merah</option>
                                <option value="Merah Hitam">Merah Hitam</option>
                                <option value="Hitam">Hitam</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl" placeholder="Masukan tanggal lahir">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
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
