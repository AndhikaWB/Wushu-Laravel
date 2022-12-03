<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Anggota Wushu Naga Mas Lampung</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <h1>Data Anggota Wushu Naga Mas Lampung</h1>
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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if(!empty($User->profile))
                    <img class="profile-user-img img-fluid img-circle"
                        src="profile/{{$User->profile}}"
                        alt="User profile picture">
                    @else
                    <img class="profile-user-img img-fluid img-circle"
                        src="dist/img/march.jpg"
                        alt="User profile picture">
                    @endif
                </div>
                <h3 class="profile-username text-center">{{$username}}</h3>

                <p class="text-muted text-center">Anggota</p>




                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editphoto">
                  Edit Photo Profile
                   </button>
              </div>
              <div class="modal fade" id="editphoto">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Pilih Photo Profile</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('biodata.upload', ['Username' => $User->username]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pilih File!</label><br>
                                    <input type="file" id="myFile" name="file">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>

                    </div>

                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Informasi Anggota</a></li>
                  <li class="nav-item"><a class="nav-link" href="#dokumen" data-toggle="tab">Dokumen</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profil">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{$User->name}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Wali" class="col-sm-2 col-form-label">Nama Wali</label>
                        <div class="col-sm-10">
                          @if(!empty($Wali->nama_wali))
                          <input type="text" class="form-control" id="Wali" value="{{$Wali->nama_wali}}" readonly>
                          @else
                            <input type="text" class="form-control" id="Wali" value="Tidak Ada"  readonly>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NomorHp" class="col-sm-2 col-form-label">NomorHp</label>
                        <div class="col-sm-10">
                          @if(!empty($Wali->no_hp))
                          <input type="number" class="form-control" id="NomorHp" value="{{$Wali->no_hp}}" readonly>
                          @else
                            <input type="text" class="form-control" id="NomorHp" value="Tidak Ada"  readonly>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NomorWali" class="col-sm-2 col-form-label">NomorWali</label>
                        <div class="col-sm-10">
                          @if(!empty($User->no_wali))
                            <input type="number" class="form-control" id="NomorWali" value="{{$User->no_wali}}"  readonly>
                            @else
                            <input type="text" class="form-control" id="NomorWali" value="Tidak Ada"  readonly>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          @if(!empty($Biodata->alamat))
                          <input type="text" class="form-control" id="Alamat" value="{{$Biodata->alamat}}"  readonly>
                          @else
                            <input type="text" class="form-control" id="Alamat" value="Tidak Ada"  readonly>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Status" value="Anggota" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-6 col-sm-10">
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">
                            Edit
                          </button>
                        </div>
                        <div class="modal fade" id="modal-edit">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Biodata Anggota {{$User->username}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('biodata.update', ['Username' => $User->username]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Nama Anggota</label>
                                      <input type="text" class="form-control" name="name" value="{{$User->name}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Nama Wali</label>
                                        @if(!empty($Wali->nama_wali))
                                        <input type="number" class="form-control" name="nama_wali" value="{{$Wali->nama_wali}}">
                                        @else
                                        <input type="text" class="form-control" name="nama_wali" placeholder="Tidak Ada">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Nomor Hp</label>
                                        @if(!empty($Wali->no_hp))
                                        <input type="number" class="form-control" name="no_hp" value="{{$Wali->no_hp}}">
                                        @else
                                        <input type="text" class="form-control" name="no_hp" placeholder="Tidak Ada">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Nomor Hp Wali</label>
                                      <input type="text" class="form-control" name="no_wali" placeholder="Tidak Ada">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Alamat</label>
                                        @if(!empty($Biodata->alamat))
                                        <input type="text" class="form-control" name="alamat" value="{{$Biodata->alamat}}">
                                        @else
                                        <input type="text" class="form-control" name="alamat" placeholder="Tidak Ada">
                                        @endif
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
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="dokumen">
                    <div class="card-body">
                        <div class="form-group d-flex">
                            <ul>
                            @if(!($Dokumen==null))
                                @foreach ($Dokumen as $file)
                                    @if($User->username == $file->username)
                                    <ol>
                                        <div>{{$file->kategori}}</div>
                                            <div class="ml-auto">
                                                <a target="_blank" href="{{asset('file_upload')}}/{{$file->file}}"" class="btn btn-warning action-btn has-icon edit-btn">Lihat</a>
                                                <a class="btn btn-danger text-white action-btn has-icon delete-btn" data-toggle="modal" data-target="#modal-delete-{{ $file->id }}">Hapus</a>
                                            </div>
                                    </ol>
                                    @endif
                                @endforeach
                            @endif
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-dokumen-{{$User->username}}">Tambah Dokumen</button>
                  </div>

                      <!-- /.modal -->
                      <div class="modal fade" id="modal-dokumen-{{ $User->username }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Dokumen Bersangkutan {{ $User->username }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('dokumen.store', ['Username' => $User->username]) }}" method="POST" enctype="multipart/form-data">
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

                      </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
