<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jadwal Ujian</title>

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
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
              <h1>Jadwal Ujian</h1>
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
                    Tambah Jadwal
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Peserta Ujian</th>
                        <th>Tanggal Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($daftar_ujian as $ujian)
                        <tr data-val="{{ $ujian->username }}">
                          <td>{{ $ujian->user->name }}</td>
                          <td>{{ $ujian->datetime_mulai->format('Y-m-d H:i') }}</td>
                          <td>{{ $ujian->datetime_akhir ? $ujian->datetime_akhir->format('Y-m-d H:i') : "" }}</td>
                          <td class="col-2">
                            <button type="button" class="btn-load-ujian btn btn-warning edit-ujian" data-toggle="modal" data-target="#modal-edit">
                              Edit
                            </button>
                            <button type="button" class="btn-load-ujian btn btn-danger hapus-ujian" data-toggle="modal" data-target="#modal-hapus">
                              Hapus
                            </button>
                          </td>
                        </tr>
                      @endforeach

                      <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Jadwal Ujian</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('ujian_edit') }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <input type="hidden" class="form-control" id="edit-old-username" name="old_username">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Peserta</label>
                                    <div>
                                      <select class="select2-username" id="edit-username" name="username" style="width: 100%">
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Mulai</label>
                                    <div class="input-group date" id="datetime-mulai-edit-picker" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input" id="edit-datetime-mulai" name="datetime_mulai" data-target="#datetime-mulai-edit-picker" placeholder="Masukkan Waktu Mulai"/>
                                      <div class="input-group-append" data-target="#datetime-mulai-edit-picker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Waktu Selesai</label>
                                    <div class="input-group date" id="datetime-akhir-edit-picker" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input" id="edit-datetime-akhir" name="datetime_akhir" data-target="#datetime-akhir-edit-picker" placeholder="Masukkan Waktu Selesai (Opsional)"/>
                                      <div class="input-group-append" data-target="#datetime-akhir-edit-picker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
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
                              <h4 class="modal-title">Hapus Jadwal Ujian</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('ujian_hapus') }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>Apakah Anda Yakin Ingin Menghapus Jadwal Ujian Ini?</label>
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
            <h4 class="modal-title">Tambah jadwal Ujian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('ujian_edit') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Peserta</label>
                  <div>
                    <select class="select2-username" id="tambah-username" name="username" style="width: 100%">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Waktu Mulai</label>
                  <div class="input-group date" id="datetime-mulai-tambah-picker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="datetime_mulai" data-target="#datetime-mulai-tambah-picker" placeholder="Masukkan Waktu Mulai"/>
                    <div class="input-group-append" data-target="#datetime-mulai-tambah-picker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Waktu Selesai</label>
                  <div class="input-group date" id="datetime-akhir-tambah-picker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="datetime_akhir" data-target="#datetime-akhir-tambah-picker" placeholder="Masukkan Waktu Selesai (Opsional)"/>
                    <div class="input-group-append" data-target="#datetime-akhir-tambah-picker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
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
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
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
        allowClear: true,
        minimumResultsForSearch: 5,
        placeholder: "Pilih Peserta Ujian",
        data: {!! json_encode($daftar_user) !!},
      });

      $('#datetime-mulai-tambah-picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
      });
      $('#datetime-mulai-edit-picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
      });
      $('#datetime-akhir-tambah-picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
      });
      $('#datetime-akhir-edit-picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
      });

      $('.tambah-ujian').click(function() {
        $('#tambah-username').empty()

        $('#tambah-username').select2({
          allowClear: true,
          minimumResultsForSearch: 5,
          placeholder: "Pilih Peserta Ujian",
          data: {!! json_encode($daftar_user) !!},
        });

        $('#tambah-username').trigger('change')
      });

      $('.edit-ujian').click(function() {
        let parent = $(this).closest('tr')
        let children = parent.children('td')

        $('#edit-username').empty()

        $('#edit-username').select2({
          allowClear: true,
          minimumResultsForSearch: 5,
          placeholder: "Pilih Peserta Ujian",
          data: {!! json_encode($daftar_user) !!},
        });

        // Tambahkan opsi nama kegiatan baru bila belum ada
        if (!$('#edit-username').find("option[value='" + parent.attr('data-val') + "']").length) {
          let tag_baru = new Option(children[0].textContent + ' (' + parent.attr('data-val') + ')', parent.attr('data-val'), false, false)
          $('#edit-username').append(tag_baru)
        }
        $('#edit-old-username').val(parent.attr('data-val'))
        $('#edit-username').val(parent.attr('data-val')).trigger('change')
        $('#edit-datetime-mulai').val(children[1].textContent)
        $('#edit-datetime-akhir').val(children[2].textContent)
      });

      $('.hapus-ujian').click(function() {
        $('#hapus-username').val($(this).closest('tr').attr('data-val'))
      });
    });
  </script>
</body>

</html>
