<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jadwal Kegiatan</title>

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
              <h1>Jadwal Kegiatan</h1>
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
                  <button type="button" class="btn btn-primary tambah-kegiatan" data-toggle="modal" data-target="#modal-tambah">
                    Tambah Jadwal Kegiatan
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Kegiatan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($daftar_kegiatan as $kegiatan)
                      <tr data-val="{{ $kegiatan->id }}">
                        <td data-val="{{ $kegiatan->id_lomba }}">{{ $kegiatan->is_lomba ? $kegiatan->lomba->nama_lomba : $kegiatan->nama_kegiatan }}</td>
                        <td>{{ $kegiatan->datetime_mulai->format('Y-m-d H:i') }}</td>
                        <td>{{ $kegiatan->datetime_akhir ? $kegiatan->datetime_akhir->format('Y-m-d H:i') : "" }}</td>
                        <td class="col-1"><span class="badge bg-primary">{{ $kegiatan->is_lomba ? "Lomba" : "Umum" }}</span></td>
                        <td class="col-2">
                          <button type="button" class="btn btn-warning edit-kegiatan" data-toggle="modal" data-target="#modal-edit">
                            Edit
                          </button>
                          <button type="button" class="btn btn-danger hapus-kegiatan" data-toggle="modal" data-target="#modal-hapus">
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
                              <form action="{{ route('kegiatan_edit') }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <input id="edit-id" name="id" type="hidden">
                                  <input id="edit-old-is-lomba" name="old_is_lomba" value="" type="hidden">
                                  <input id="edit-old-id-lomba" name="old_id_lomba" value="" type="hidden">
                                  <input id="edit-old-nama-kegiatan" name="old_nama_kegiatan" value="" type="hidden">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tipe Kegiatan</label>
                                    <select class="form-control select2-is-lomba" id="edit-is-lomba" name="is_lomba">
                                      <option value="0">Umum</option>
                                      <option value="1">Lomba</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kegiatan</label>
                                    <select class="form-control select2-nama-kegiatan" id="edit-nama-kegiatan" name="nama_kegiatan">
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Waktu Mulai</label>
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
                              <form action="{{ route('kegiatan_hapus') }}" method="post">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>Apakah Anda Yakin Ingin Menghapus Jadwal Kegiatan Ini?</label>
                                    <input id="hapus-id" name="id" type="hidden">
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

      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Jadwal Kegiatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('kegiatan_edit') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipe Kegiatan</label>
                    <select class="form-control select2-is-lomba" id="tambah-is-lomba" name="is_lomba">
                      <option value="0">Umum</option>
                      <option value="1">Lomba</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kegiatan</label>
                    <select class="form-control select2-nama-kegiatan" id="tambah-nama-kegiatan" name="nama_kegiatan">
                    </select>
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
        }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)')

        /*
          Format waktu untuk datetime picker
        */

        $('#datetime-mulai-tambah-picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
        })

        $('#datetime-mulai-edit-picker').datetimepicker({
          format: 'YYYY-MM-DD HH:mm'
        })

        $('#datetime-akhir-tambah-picker').datetimepicker({
          format: 'YYYY-MM-DD HH:mm'
        })

        $('#datetime-akhir-edit-picker').datetimepicker({
          format: 'YYYY-MM-DD HH:mm'
        })

        /*
          Inisialisasi masing-masing form select2
        */

        $('.select2-is-lomba').select2({
          width: "100%",
          allowClear: true,
          minimumResultsForSearch: Infinity,
          placeholder: "Pilih Tipe Kegiatan",
        })

        $('.select2-nama-kegiatan').select2({
          tags: true,
          width: "100%",
          data: ["Latihan Wushu"],
          allowClear: true,
          minimumResultsForSearch: 5,
          placeholder: "Pilih atau Masukkan Nama Kegiatan Baru",
        })

        /*
          Ubah nama kegiatan menjadi nama lomba bila tipe kegiatan berupa lomba
        */

        $('.select2-is-lomba').on("select2:select", function(e) {
          // Lomba
          if ($(this).val() == 1) {
            // Hapus list opsi
            $('.select2-nama-kegiatan').empty()
            // Tambahkan ulang opsi
            $('.select2-nama-kegiatan').select2({
              tags: false,
              width: "100%",
              data: {!! json_encode($daftar_lomba) !!},
              allowClear: true,
              minimumResultsForSearch: 5,
              placeholder: "Pilih Lomba",
            })
            // Reset opsi yang sedang terpilih
            $('.select2-nama-kegiatan').val(null).trigger("change")

            if($(this).parents('#modal-edit').length > 0) {
              if ($('#edit-old-is-lomba').val() == "1") {
                if (!$('#edit-nama-kegiatan').find("option[value='" + $('#edit-old-id-lomba').val() + "']").length) {
                  let tag_baru = new Option($('#edit-old-nama-kegiatan').val(), $('#edit-old-id-lomba').val(), false, false)
                  $('#edit-nama-kegiatan').append(tag_baru)
                }
                $('#edit-nama-kegiatan').val($('#edit-old-id-lomba').val()).trigger("change")
              } 
            }
          // Bukan lomba
          } else {
            // Hapus list opsi
            $('.select2-nama-kegiatan').empty()
            // Tambahkan ulang opsi
            $('.select2-nama-kegiatan').select2({
              tags: true,
              width: "100%",
              data: ["Latihan Wushu"],
              allowClear: true,
              placeholder: "Pilih atau Masukkan Nama Kegiatan Baru"
            })
            // Reset opsi yang sedang terpilih
            $('.select2-nama-kegiatan').val(null).trigger("change")

            if($(this).parents('#modal-edit').length > 0) {
              if ($('#edit-old-is-lomba').val() == "0") {
                if (!$('#edit-nama-kegiatan').find("option[value='" + $('#edit-old-nama-kegiatan').val() + "']").length) {
                  let tag_baru = new Option($('#edit-old-nama-kegiatan').val(), $('#edit-old-nama-kegiatan').val(), false, false)
                  $('#edit-nama-kegiatan').append(tag_baru)
                }
                $('#edit-nama-kegiatan').val($('#edit-old-nama-kegiatan').val()).trigger("change")
              }
            }
          }
        })

        // ====================

        $('.edit-kegiatan').click(function() {
          let parent = $(this).closest('tr')
          let children = parent.children('td')
          let id_kegiatan = parent.attr('data-val')
          let id_lomba = children[0].getAttribute('data-val')
          let is_lomba = id_lomba ? 1 : 0
          let nama_kegiatan = children[0].textContent
          let datetime_mulai = children[1].textContent
          let datetime_akhir = children[2].textContent

          // Cek apakah berupa lomba atau bukan
          $('#edit-is-lomba').val(is_lomba).trigger("change")
          document.getElementById("edit-old-is-lomba").value = is_lomba
          document.getElementById("edit-old-id-lomba").value = id_lomba
          document.getElementById("edit-old-nama-kegiatan").value = nama_kegiatan

          // Lomba
          if ($('#edit-is-lomba').val() == 1) {
            // Hapus list opsi
            $('#edit-nama-kegiatan').empty()
            // Tambahkan ulang opsi
            $('#edit-nama-kegiatan').select2({
              tags: false,
              width: "100%",
              data: {!! json_encode($daftar_lomba) !!},
              allowClear: true,
              minimumResultsForSearch: 5,
              placeholder: "Pilih Lomba",
            })
            // Tambahkan opsi lomba saat ini (bypass duplikat)
            if (!$('#edit-nama-kegiatan').find("option[value='" + id_lomba + "']").length) {
              let tag_baru = new Option(nama_kegiatan, id_lomba, false, false)
              $('#edit-nama-kegiatan').append(tag_baru)
            }
            // Set opsi yang sedang terpilih
            $('#edit-nama-kegiatan').val(id_lomba).trigger("change")
          // Bukan lomba
          } else {
            // Hapus list opsi
            $('#edit-nama-kegiatan').empty()
            // Tambahkan ulang opsi
            $('#edit-nama-kegiatan').select2({
              tags: true,
              width: "100%",
              data: ["Latihan Wushu"],
              allowClear: true,
              placeholder: "Pilih atau Masukkan Nama Kegiatan Baru"
            })
            // Tambahkan opsi nama kegiatan baru bila belum ada
            if (!$('#edit-nama-kegiatan').find("option[value='" + nama_kegiatan + "']").length) {
              let tag_baru = new Option(nama_kegiatan, nama_kegiatan, false, false)
              $('#edit-nama-kegiatan').append(tag_baru)
            }
            // Set opsi yang sedang terpilih
            $('#edit-nama-kegiatan').val(nama_kegiatan).trigger("change")
          }

          $('#edit-id').val(id_kegiatan)
          $('#edit-datetime-akhir').val(datetime_akhir)
          $('#edit-datetime-mulai').val(datetime_mulai)
        })

        // ====================

        $('.tambah-kegiatan').click(function() {
          // Lomba
          if ($('#tambah-is-lomba').val() == 1) {
            // Hapus list opsi
            $('#tambah-nama-kegiatan').empty()
            // Tambahkan ulang opsi
            $('#tambah-nama-kegiatan').select2({
              tags: false,
              width: "100%",
              data: {!! json_encode($daftar_lomba) !!},
              allowClear: true,
              minimumResultsForSearch: 5,
              placeholder: "Pilih Lomba",
            })
            // Reset opsi yang sedang terpilih
            $('#tambah-nama-kegiatan').val(null).trigger("change")
          // Bukan lomba
          } else {
            // Hapus list opsi
            $('#tambah-nama-kegiatan').empty()
            // Tambahkan ulang opsi
            $('#tambah-nama-kegiatan').select2({
              tags: true,
              width: "100%",
              data: ["Latihan Wushu"],
              allowClear: true,
              placeholder: "Pilih atau Masukkan Nama Kegiatan Baru"
            })
            // Reset opsi yang sedang terpilih
            $('#tambah-nama-kegiatan').val(null).trigger("change")
          }
        })

        $('.hapus-kegiatan').click(function() {
          $('#hapus-id').val($(this).closest('tr').attr('data-val'))
        });
      })
    </script>
    <style>
      select[readonly].select2-hidden-accessible + .select2-container {
        pointer-events: none;
        touch-action: none;
      }

      select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
      }

      select[readonly].select2-hidden-accessible + .select2-container .select2-selection__arrow,
      select[readonly].select2-hidden-accessible + .select2-container .select2-selection__clear {
        display: none;
      }
    </style>
</body>

</html>
