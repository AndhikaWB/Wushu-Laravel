<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Lomba</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  {{-- AW --}}
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                    Tambah Lomba
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Lomba</th>
                        <th>Tingkatan</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($daftar_lomba as $lomba)
                        <tr data-val="{{ $lomba->id }}">
                          <td>{{ $lomba->nama_lomba }}</td>
                          <td>{{ $lomba->tingkatan }}</td>
                          <td class="col-2">
                            @foreach ($lomba->kategori as $kategori)
                              <span class="badge bg-primary">{{ $kategori }}</span>
                            @endforeach
                          </td>
                          <td>{{ $lomba->lokasi }}</td>
                          <td class="col-1">
                            <div class="btn-group">
                              <button type="button" class="btn btn-success btn-flat">Aksi</button>
                              <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item edit-lomba" data-toggle="modal" data-target="#modal-edit">Edit</a>
                                <a class="dropdown-item hapus-lomba" data-toggle="modal" data-target="#modal-hapus">Hapus</a>
                                <a class="dropdown-item" href="{{ route('peserta', $lomba->id) }}">Daftar Peserta</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Lomba</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('lomba_edit') }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <input type="hidden" class="form-control" id="edit-id" name="id">
                                  <div class="form-group">
                                    <label>Nama Lomba</label>
                                    <input type="text" class="form-control" id="edit-nama-lomba" name="nama_lomba" placeholder="Masukkan Nama Lomba">
                                  </div>
                                  <div class="form-group">
                                    <label>Kategori Lomba</label>
                                    <div>
                                      <select class="form-control select2-kategori" id="edit-kategori" name="kategori[]">
                                        <option value="Changquan">Changquan</option>
                                        <option value="Nanquan">Nanquan</option>
                                        <option value="Taijiquan">Taijiquan</option>
                                        <option value="Daoshu">Daoshu</option>
                                        <option value="Nandao">Nandao</option>
                                        <option value="Jian">Jian</option>
                                        <option value="Taijijian">Taijijian</option>
                                        <option value="Gunshu">Gunshu</option>
                                        <option value="Nangun">Nangun</option>
                                        <option value="Qiang">Qiang</option>
                                        <option value="Duilian">Duilian</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Tingkatan</label>
                                    <div>
                                      <select class="form-control select2-tingkatan" id="edit-tingkatan" name="tingkatan">
                                        <option value="Lokal/RT/RW">Lokal/RT/RW</option>
                                        <option value="Desa/Kelurahan">Desa/Kelurahan</option>
                                        <option value="Kecamatan">Kecamatan</option>
                                        <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Internasional">Internasional</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Lokasi</label>
                                    <textarea class="form-control" rows="3" placeholder="Masukkan Lokasi" id="edit-lokasi" name="lokasi"></textarea>
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
                              <h4 class="modal-title">Hapus Lomba</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('lomba_hapus') }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>Apakah Anda Yakin Ingin Menghapus Lomba Ini?</label>
                                    <input type="hidden" class="form-control" id="hapus-id" name="id">
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

    <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Lomba</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('lomba_edit') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Lomba</label>
                  <input type="text" class="form-control" name="nama_lomba" placeholder="Masukkan Nama Lomba">
                </div>
                <div class="form-group">
                  <label>Kategori Lomba</label>
                  <div>
                    <select class="form-control select2-kategori" name="kategori[]">
                      <option value="Changquan">Changquan</option>
                      <option value="Nanquan">Nanquan</option>
                      <option value="Taijiquan">Taijiquan</option>
                      <option value="Daoshu">Daoshu</option>
                      <option value="Nandao">Nandao</option>
                      <option value="Jian">Jian</option>
                      <option value="Taijijian">Taijijian</option>
                      <option value="Gunshu">Gunshu</option>
                      <option value="Nangun">Nangun</option>
                      <option value="Qiang">Qiang</option>
                      <option value="Duilian">Duilian
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Tingkatan</label>
                  <div>
                    <select class="form-control select2-tingkatan" name="tingkatan">
                      <option value="Lokal/RT/RW">Lokal/RT/RW</option>
                      <option value="Desa/Kelurahan">Desa/Kelurahan</option>
                      <option value="Kecamatan">Kecamatan</option>
                      <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                      <option value="Provinsi">Provinsi</option>
                      <option value="Nasional">Nasional</option>
                      <option value="Internasional">Internasional</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <textarea class="form-control" rows="3" placeholder="Masukkan Lokasi" name="lokasi"></textarea>
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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
  {{-- AW --}}
  <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#table1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
      // AW
      $('.select2-kategori').select2({
        tags: true,
        multiple: true,
        width: "100%",
        placeholder: "Pilih atau Ketik Kategori Baru",
      });
      $('.select2-tingkatan').select2({
        tags: true,
        width: "100%",
        allowClear: true,
        placeholder: "Pilih atau Ketik Tingkatan Baru",
      });

      $('.edit-lomba').click(function() {
        let parent = $(this).closest('tr')
        let children = parent.children('td')
        $('#edit-id').val(parent.attr('data-val'))
        $('#edit-nama-lomba').val(children[0].textContent)
        $('#edit-lokasi').val(children[3].textContent)

        let kategori_array = []
          children.children('span').each(function() {
          kategori_array.push($(this).text())
          // Bila array belum terdapat pada list kategori maka tambahkan kategori baru
          if (!$('#edit-kategori').find("option[value='" + $(this).text() + "']").length) {
            let tag_baru = new Option($(this).text(), $(this).text(), false, false);
            $('#edit-kategori').append(tag_baru).trigger('change');
          }
        })
        $('#edit-kategori').val(kategori_array).trigger('change')

        if (!$('#edit-tingkatan').find("option[value='" + children[1].textContent + "']").length) {
          let tag_baru = new Option(children[1].textContent, children[1].textContent, false, false);
          $('#edit-tingkatan').append(tag_baru).trigger('change');
        }
        $('#edit-tingkatan').val(children[1].textContent).trigger('change')
      });
      $('.hapus-lomba').click(function() {
        let parent = $(this).closest('tr')
        let children = parent.children('td')
        $('#hapus-id').val(parent.attr('data-val'))
      });
    });
  </script>
</body>

</html>
