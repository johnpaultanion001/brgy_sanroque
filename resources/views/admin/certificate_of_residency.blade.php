@extends('../layouts.admin')
@section('sub-title','Certificate Of Residency')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection



@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      
    </div>
</div>

<div class="container-fluid mt--6 table-load">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">Manage Certificate Of Residency</h3>
            </div>
            <div class="col-left">
              <button class="btn btn-primary" id="customize_print">PRINT</button>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Purpose</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Admin Comment</th>
                <th scope="col">Date</th>
                <th scope="col">Date Claimed</th>
              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($brgyCertificates as $brgyCertificate)
                    <tr>
                      <td>
                          <button type="button" name="change" change="{{  $brgyCertificate->id ?? '' }}"  class="change  btn btn-sm  btn-primary">Change Status</button>
                          <button type="button" name="remove" remove="{{  $brgyCertificate->id ?? '' }}" class="remove btn btn-sm  btn-danger">Remove</button>
                      </td>
                      <td>
                          {{  $brgyCertificate->purpose ?? '' }}
                      </td>
                      <td>
                          {{  $brgyCertificate->user->name ?? '' }}
                      </td>
                      <td>
                          {{  $brgyCertificate->user->email ?? '' }}
                      </td>

                      <td>
                            {{  $brgyCertificate->user->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $brgyCertificate->user->address ?? '' }}
                      </td>
                      
                      <td>
                            @if($brgyCertificate->status == 0)
                                  <span class="badge-warning p-2">Pending</span><br>
                            @elseif ($brgyCertificate->status == 1)
                                <span class="badge-success p-2">Approved</span>
                            @elseif ($brgyCertificate->status == 2)
                                <span class="badge-danger p-2">Decline</span>
                            @elseif ($brgyCertificate->status == 3)
                                <span class="badge-primary p-2">Claimed</span>
                            @endif
                      </td>
                      <td>
                          {{  $brgyCertificate->comment ?? '' }}
                      </td>
                      <td>
                          {{ $brgyCertificate->created_at->format('M j Y h:i A') }}
                      </td>
                      <td>
                          @if($brgyCertificate->status == 3)
                            {{ $brgyCertificate->updated_at->format('M j Y h:i A') }}
                          @endif
                      </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
                    <div class="form-group">
                      <label for="status" class="bmd-label-floating">Status <span class="text-danger">*</span></label>
                      <select name="status" id="status" class="form-control select2">
                          <option value="" disabled selected>Select Status</option>
                              <option value="0">Pending</option>
                              <option value="1">Approve</option>
                              <option value="2">Decline</option>
                              <option value="3">Claimed</option>
                      </select>
                    </div>
                  
                <div class="form-group">
                  <label for="comment" id="lblpurpose" class="bmd-label-floating">Comment: <span class="text-danger">*</span></label>
                  <textarea class="form-control comment" rows="4" name="comment" id="comment"></textarea>
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-comment"></strong>
                  </span>
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn  btn-primary" value="Save" />
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</form>

<div class="modal fade" id="printModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">PRINT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="print_modal" id="print_modal">
            <div class="table-responsive">
              <table class="table" id="table_print">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Purpose</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Admin Comment</th>
                    <th scope="col">Date</th>
                    <th scope="col">Date Claimed</th>
                  </tr>
                </thead>
                <tbody class="text-uppercase font-weight-bold">
                  @foreach($brgyCertificates as $brgyCertificate)
                        <tr>
                          <td>
                              {{  $brgyCertificate->purpose ?? '' }}
                          </td>
                          <td>
                              {{  $brgyCertificate->user->name ?? '' }}
                          </td>
                          <td>
                              {{  $brgyCertificate->user->email ?? '' }}
                          </td>

                          <td>
                                {{  $brgyCertificate->user->contact_number ?? '' }}
                          </td>
                          <td>
                                {{  $brgyCertificate->user->address ?? '' }}
                          </td>
                          
                          <td>
                              @if($brgyCertificate->status == 0)
                                    <span class="badge-warning p-2">Pending</span><br>
                              @elseif ($brgyCertificate->status == 1)
                                  <span class="badge-success p-2">Approved</span>
                              @elseif ($brgyCertificate->status == 2)
                                  <span class="badge-danger p-2">Decline</span>
                              @elseif ($brgyCertificate->status == 3)
                                  <span class="badge-primary p-2">Claimed</span>
                              @endif
                          </td>
                          <td>
                              {{  $brgyCertificate->comment ?? '' }}
                          </td>
                          <td>
                              {{ $brgyCertificate->created_at->format('M j Y h:i A') }}

                             
                          </td>
                          <td>
                              @if($brgyCertificate->status == 3)
                                {{ $brgyCertificate->updated_at->format('M j Y h:i A') }}
                              @endif
                          </td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
             
            </div>
            <br><br><br><br>
            <h4 class="text-uppercase">PREPARED BY:{{Auth::user()->name}}</h4>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="submit" name="print_button" id="print_button" class="btn  btn-primary" value="PRINT" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@section('footer')
    @include('../partials.admin.footer')
@endsection


@endsection

@section('script')
<script>
$(function () {
let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

$.extend(true, $.fn.dataTable.defaults, {
  pageLength: 100,
  'columnDefs': [{ 'orderable': false, 'targets': 0 }],
});

$('.datatable-brgy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
});

$(document).on('click', '.change', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Change Status');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('#status').select2({
      placeholder: 'Select Status'
    })

    var id = $(this).attr('change');
    $('#hidden_id').val(id);

    $.ajax({
        url :"/admin/certificate_of_residency/"+id,
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
                  if(key == 'status'){
                      $("#status").select2("trigger", "select", {
                          data: { id: value }
                      });
                  }
                  
              }
            })
            
            $('#action_button').val('Update');
            $('#action').val('Edit');
        }
    })
});

$('#myForm').on('submit', function(event){
  event.preventDefault();
  
  var id = $('#hidden_id').val();
  var action_url = "certificate_of_residency/" + id;
  var type = "PUT"; 

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


$(document).on('click', '.remove', function(){
  var id = $(this).attr('remove');
  $.confirm({
      title: 'Confirmation',
      content: 'You really want to remove this record?',
      autoClose: 'cancel|10000',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"certificate_of_residency/"+id,
                      method:'DELETE',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                        $('#titletable').text('Loading...');
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

$(document).on('click', '#customize_print', function(){
  $('#printModal').modal('show');
});




$(document).on('click', '#print_button', function(){
    var mywindow = window.open('', 'PRINT');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>'); 
    mywindow.document.write('</head><body style="@media page{size: landscape;}">');
    
    mywindow.document.write(document.getElementById("print_modal").innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus(); 

    mywindow.print();
    mywindow.close();

    return true;
});


</script>
@endsection
