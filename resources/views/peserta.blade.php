<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Peserta Lomba</title>

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
              <h1>Daftar Peserta Lomba</h1>
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
                    Tambah Peserta Lomba
                  </button>
                  @if (!$terdaftar)
                    <button type="button" class="btn btn-warning ajukan-peserta" data-toggle="modal" data-target="#modal-ajukan">
                      Ajukan Diri Sebagai Peserta
                    </button>
                  @endif
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-informasi">
                    Informasi Lomba
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Peserta Lomba</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($daftar_peserta as $peserta)
                        <tr data-val="{{ $peserta->username }}">
                          <td>{{ $peserta->user->name }}</td>
                          <td class="col-2">
                            @foreach ($peserta->kategori as $kategori)
                              <span class="badge bg-primary">{{ $kategori }}</span>
                            @endforeach
                          </td>
                          <td>{{ $peserta->status }}</td>
                          <td class="col-2">
                            <button type="button" class="btn-load-peserta btn btn-warning edit-peserta" data-toggle="modal" data-target="#modal-edit">
                              Edit
                            </button>
                            <button type="button" class="btn-load-peserta btn btn-danger hapus-peserta" data-toggle="modal" data-target="#modal-hapus">
                              Hapus
                            </button>
                          </td>
                        </tr>
                      @endforeach

                      <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Peserta Lomba</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('peserta_edit', $lomba->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <input type="hidden" class="form-control" id="edit-old-username" name="old_username">
                                  <div class="form-group">
                                    <label>Nama Peserta Lomba</label>
                                    <select class="form-control select2-username" id="edit-username" name="username">
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Kategori Lomba</label>
                                    <div>
                                      <select class="form-control select2-kategori" id="edit-kategori" name="kategori[]">
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                      <select class="form-control select2-status" id="edit-status" name="status">
                                      </select>
                                    </div>
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
                              <h4 class="modal-title">Hapus Peserta Lomba</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('peserta_hapus', $lomba->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>Apakah Anda Yakin Ingin Menghapus Peserta Lomba Ini?</label>
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
            <h4 class="modal-title">Tambah Peserta Lomba</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('peserta_edit', $lomba->id) }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Peserta Lomba</label>
                  <select class="form-control select2-username" id="tambah-username" name="username">
                  </select>
                </div>
                <div class="form-group">
                  <label>Kategori Lomba</label>
                  <div>
                    <select class="form-control select2-kategori" id="tambah-kategori" name="kategori[]">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <div>
                    <select class="form-control select2-status" id="tambah-status" name="status">
                    </select>
                  </div>
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

    <div class="modal fade" id="modal-ajukan">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pengajuan Peserta Lomba</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('peserta_edit', $lomba->id) }}" method="post">
              @csrf
              <div class="card-body">
                <input type="hidden" class="form-control" id="ajukan-username" name="username" value="{{ $username }}">
                <input type="hidden" class="form-control" id="ajukan-status" name="status" value="Tahap Pengajuan">
                <div class="form-group">
                  <label>Kategori Lomba</label>
                  <div>
                    <select class="form-control select2-kategori" id="ajukan-kategori" name="kategori[]">
                    </select>
                  </div>
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

    <div class="modal fade" id="modal-informasi">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Informasi Lomba</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Lomba</label>
                  <input readonly class="form-control" name="nama_lomba" value="{{ $lomba->nama_lomba }}">
                </div>
                <div class="form-group">
                  <label>Tingkatan</label>
                  <input readonly class="form-control" name="tingkatan" value="{{ $lomba->tingkatan }}">
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <textarea readonly class="form-control" rows="3" name="lokasi">{{ $lomba->lokasi }}</textarea>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
      $('.select2-username').select2({
        width: "100%",
        allowClear: true,
        minimumResultsForSearch: 5,
        placeholder: "Pilih Peserta Ujian",
        data: {!! json_encode($daftar_user) !!},
      });
      $('.select2-kategori').select2({
        multiple: true,
        width: "100%",
        minimumResultsForSearch: 5,
        data: {!! json_encode($daftar_kategori) !!},
        placeholder: "Pilih Kategori Lomba",
      });
      $('.select2-status').select2({
        tags: true,
        width: "100%",
        allowClear: true,
        data: ["Tahap Pengajuan","Proses Seleksi","Gagal Seleksi","Ikut Lomba"],
        placeholder: "Pilih atau Ketik Status Baru",
      });

      $('.edit-peserta').click(function() {
        let parent = $(this).closest('tr')
        let children = parent.children('td')

        $('#edit-status').val(children[2].textContent)

        $('#edit-username').empty()
        $('#edit-username').select2({
          width: "100%",
          allowClear: true,
          minimumResultsForSearch: 5,
          placeholder: "Pilih Peserta Ujian",
          data: {!! json_encode($daftar_user) !!},
        }).trigger('change');

        if (!$('#edit-username').find("option[value='" + parent.attr('data-val') + "']").length) {
          let tag_baru = new Option(children[0].textContent + ' (' + parent.attr('data-val') + ')', parent.attr('data-val'), false, false);
          $('#edit-username').append(tag_baru).trigger('change');
        }
        $('#edit-username').val(parent.attr('data-val')).trigger('change')
        $('#edit-old-username').val(parent.attr('data-val'))

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

        if (!$('#edit-status').find("option[value='" + children[2].textContent + "']").length) {
          let tag_baru = new Option(children[2].textContent, children[2].textContent, false, false);
          $('#edit-status').append(tag_baru).trigger('change');
        }
        $('#edit-status').val(children[2].textContent).trigger('change')
      });
      $('.hapus-peserta').click(function() {
        let parent = $(this).closest('tr')
        let children = parent.children('td')
        $('#hapus-username').val(parent.attr('data-val'))
      });
    });
  </script>
</body>

</html>
