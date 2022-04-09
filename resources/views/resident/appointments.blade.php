@extends('../layouts.site')
@section('sub-title','Appointments')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <br><br><br>
            
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="text-center title">Appointments</h2>
          </div>
          <div class="col-md-12 text-right">
            <button class="btn btn-primary btn-raised" name="create_record" id="create_record" >Set A Appointment</button>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-12 col-md-8">
                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#calendar-1" role="tab" data-toggle="tab">
                      <i class="material-icons">dashboard</i>
                      Calendar
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="apps" href="#appointment-1" role="tab" data-toggle="tab">
                      <i class="material-icons">schedule</i>
                      Appointments
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-space">
                  <div class="tab-pane active" id="calendar-1">
                      <div class="col-md-12">
                          <div class="card text-primary">
                              <div class="card-body ">
                                  <div id='calendar' class="text-primary"></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="appointment-1">
                      <div class="col-md-12"> 
                          <div class="row p-2">
                              @forelse($appointments1 as $appointment)
                              <div class="col-md-12">
                                  <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Appointment</h5>
                                      <h6 class="card-subtitle mb-2 text-muted">{{ \Carbon\Carbon::parse($appointment->date)->isoFormat('MMM Do YYYY')}}</h6>
                                      <h6 class="card-subtitle mb-2 text-muted">{{ $appointment->time }}</h6>
                                      <p class="card-text">{{$appointment->type_of_appointment}}</p>
                                      <p class="card-text">{{$appointment->purpose}}</p>

                                      @if($appointment->status == 0)
                                          <p class="badge badge-warning">Pending</p><br>
                                          <button type="button" name="edit" edit="{{  $appointment->id ?? '' }}"  class="edit btn btn-sm btn-link text-primary">Edit Info.</button>
                                          <button type="button" name="cancel" cancel="{{  $appointment->id ?? '' }}"  class="cancel btn btn-sm btn-link text-danger">Cancel</button>
                                      @elseif ($appointment->status == 1)
                                          <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                          <p class="card-text">{{$appointment->comment}}</p>
                                          <p class="badge badge-success">Approved</p>

                                      @elseif ($appointment->status == 2)
                                          <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                          <p class="card-text">{{$appointment->comment}}</p>
                                          <p class="badge badge-danger">Decline</p>
                                      @elseif ($appointment->status == 3)
                                          <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                          <p class="card-text">{{$appointment->comment}}</p>
                                          <p class="badge badge-primary">Completed</p>
                                      @endif
                                  </div>
                              </div>
                              </div>
                              @empty
                              <div class="col-md-12">
                                  <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">No available data</h5>
                                  </div>
                              </div>
                              </div>
                              @endforelse
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
       </div>
      </div>
    </div>
  </div>

    <form method="post" id="myForm" >
    @csrf
    <div class="modal fade" id="formModal" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
            </button>
          </div>
          <div class="modal-body">
        
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Name</label>
                      <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Age</label>
                      <input type="text" class="form-control" value="{{$age}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Contact Number</label>
                      <input type="text" class="form-control" value="{{Auth::user()->contact_number}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Your Address</label>
                      <input type="text" class="form-control" value="{{Auth::user()->address}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label-control">Date <span class="text-danger">*</span></label>
                      
                      <input type="text" class="form-control datetimepicker" id="date" name="date"  autocomplete="off">

                      <span class="invalid-feedback" role="alert">
                            <strong id="error-date"></strong>
                        </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label-control">Time <span class="text-danger">*</span></label>
                      <input type="text" class="form-control timepicker" id="time" name="time"  autocomplete="off">
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-time"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="label-control">Type Of Appointment <span class="text-danger">*</span></label>
                      <select name="type_of_appointment" id="type_of_appointment" class="form-control select2">
                          <option value="" disabled selected>Select Appointment</option>
                              <option value="SESSION">SESSION</option>
                              <option value="BRGY CLEARANCE">BRGY CLEARANCE</option> 
                      </select>
                      <span class="invalid-feedback" role="alert">
                        <strong id="error-type_of_appointment"></strong>
                      </span>
                    </div>
                    <p class="text-danger font-weight-bold note"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label-control">Purpose <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="4" name="purpose" id="purpose" required></textarea>
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn  btn-primary" value="Save" />
            <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>

 
@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>


<script> 

  function calendaryo(){  
    events={!! json_encode($events) !!}; 
    $('#calendar').fullCalendar({
        events: events,
        selectable: true,
        selectHelper: true,

        select: (start, end, allDay) => {
                    var startDate = moment(start),
                    endDate = moment(end),
                    date = startDate.clone(),
                    isWeekend = false;

                    while (date.isBefore(endDate)) {
                        if (date.isoWeekday() == 6 || date.isoWeekday() == 7) {
                        isWeekend = true;
                        }    
                        date.add(1, 'day');
                    }

                    var clickdate = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                    var today = moment().format('YYYY-MM-DD');

                    if(clickdate < today){
                    $.alert({
                            title: 'Message Error',
                            content: 'Past date event not allowed ',
                            type: 'red',
                        })
                    $('#calendar').fullCalendar('unselect');
                    return false
                    }
                else if(clickdate == today){
                    $.alert({
                            title: 'Message Error',
                            content: 'You can`t make appointment today',
                            type: 'red',
                        })
                    $('#calendar').fullCalendar('unselect');
                    return false
                    }
                    
                
                    $('#formModal').modal('show');
                    $('#date').val(clickdate);
                    $('.form-control').removeClass('is-invalid')
                    $('.modal-title').text('Add Appointment');
                    $('#action_button').val('Submit');
                    $('#action').val('Add');
                }

    })
    document.getElementById('apps').click();
}

    $(document).ready(function () {
        materialKit.initFormExtendedDatetimepickers();
        return calendaryo();
        
    });

  $(document).on('click', '#create_record', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.modal-title').text('Add Appointment');
    $('#action_button').val('Submit');
    $('.form-control').removeClass('is-invalid')
    $('#action').val('Add');
    $('#lblpurpose').addClass('bmd-label-floating')
    $('.note').html(null);
  });

  $('#myForm').on('submit', function(event){
  event.preventDefault();
  $('.form-control').removeClass('is-invalid')
  var action_url = "{{ route('resident.appointments.store') }}";
  var type = "POST";

  if($('#action').val() == 'Edit'){
      var id = $('#hidden_id').val();
      action_url = "appointments/" + id;
      type = "PUT";
  }

  $.ajax({
      url: action_url,
      method:type,
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
          $("#action_button").attr("disabled", true);
          $("#action_button").attr("value", "Loading..");
      },
      success:function(data){
          var html = '';
          if(data.errors){
              $.each(data.errors, function(key,value){
                  if($('#action').val() == 'Edit'){
                      $("#action_button").attr("disabled", false);
                      $("#action_button").attr("value", "Update");
                  }else{
                      $("#action_button").attr("disabled", false);
                      $("#action_button").attr("value", "Submit");
                  }
                  if(key == $('#'+key).attr('id')){
                      $('#'+key).addClass('is-invalid')
                      $('#error-'+key).text(value)
                  }
              })
          }
          if(data.onepending){
            if($('#action').val() == 'Edit'){
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Update");
              }else{
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Submit");
              }
              $.confirm({
                  title: 'Warning',
                  content: data.onepending,
                  type: 'red',
                  buttons: {
                          confirm: {
                              text: 'confirm',
                              btnClass: 'btn-blue',
                              keys: ['enter', 'shift'],
                              action: function(){
                                $('#formModal').modal('hide');
                              }
                          },
                          
                      }
                  });

          }
          if(data.noofficetime){
            if($('#action').val() == 'Edit'){
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Update");
            }else{
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Submit");
            }
            $('#time').addClass('is-invalid')
            $('#error-time').text(data.noofficetime);
          }
          if(data.success){
              if($('#action').val() == 'Edit'){
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Update");
              }else{
                  $("#action_button").attr("disabled", false);
                  $("#action_button").attr("value", "Submit");
              }
              $('.form-control').removeClass('is-invalid')
              $('#myForm')[0].reset();
              $('#formModal').modal('hide');
              $.confirm({
                  title: 'Confirmation',
                  content: data.success,
                  type: 'green',
                  buttons: {
                          confirm: {
                              text: 'confirm',
                              btnClass: 'btn-blue',
                              keys: ['enter', 'shift'],
                              action: function(){
                                  location.reload();
                              }
                          },
                          
                      }
                  });
          }
      
      }
  });
});

$(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Edit Appointment');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    var id = $(this).attr('edit');

    $.ajax({
        url :"/resident/appointments/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");
        },
        success:function(data){
            if($('#action').val() == 'Edit'){
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Update");
            }else{
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Submit");
            }
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                    if(key == 'service_id'){
                        $("#service_id").select2("trigger", "select", {
                            data: { id: value }
                        });
                    }
                }
            })
            $('#hidden_id').val(id);
            $('#action_button').val('Update');
            $('#action').val('Edit');
        }
    })
});

$(document).on('click', '.cancel', function(){
  var id = $(this).attr('cancel');
  $.confirm({
      title: 'Confirmation',
      content: 'You really want to cancel this record?',
      autoClose: 'cancel|10000',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"appointments/"+id,
                      method:'DELETE',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                        $('.cancel').html('Canceling..');
                      },
                      success:function(data){
                          if(data.success){
                            $.confirm({
                              title: 'Confirmation',
                              content: data.success,
                              type: 'green',
                              buttons: {
                                      confirm: {
                                          text: 'confirm',
                                          btnClass: 'btn-blue',
                                          keys: ['enter', 'shift'],
                                          action: function(){
                                              location.reload();
                                          }
                                      },
                                      
                                  }
                              });
                          }
                      }
                  })
              }
          },
          cancel:  {
              text: 'cancel',
              btnClass: 'btn-red',
              keys: ['enter', 'shift'],
          }
      }
  });

});

$('select[name="type_of_appointment"]').on("change", function(event){
    var appointment = $('#type_of_appointment').val();
    if(appointment == "BRGY CLEARANCE"){
      $('.note').html('* Please take note that you need to bring 1 valid ID to claim your baranggay clearance. Other requirements will be discuss upon processing your documents');
    }else{
      $('.note').html(null);
    }
      
    
 
});

</script>
@endsection