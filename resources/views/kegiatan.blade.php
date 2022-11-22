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
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css')}}">
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Jadwal
              </button>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Kegiatan</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Latihan Coy
                  </td>
                  <td>18-10-2022</td>
                  <td> 19-10-2022</td>
                  <td>Ice Box</td>
                  <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus">
                      Hapus
                    </button>
                  </td>
                </tr>

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
                        <form action="" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Kegiatan</label>
                              <input type="text" class="form-control" name="namakegiatan" placeholder="Nama Kegiatan">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Mulai</label>
                              <input type="date" class="form-control" name="tglm" placeholder="Tanggal Mulai">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal Selesai</label>
                              <input type="date" class="form-control" name="tgls" placeholder="Tanggal Selesai">
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
                        <form action="" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Apakah Anda Ingin menghapus Jadwal Kegiatan?</label>
                              <input type="text" class="form-control" name="namakegiatan" placeholder="Nama Kegiatan">
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

  
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah jadwal Kegiatan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Kegiatan</label>
                <input type="text" class="form-control" name="namakegiatan" placeholder="Masukan Nama Kegiatan">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" placeholder="Masukan tanggal mulai">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" placeholder="Masukan Tanggal Selesai">
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
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar/main.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
