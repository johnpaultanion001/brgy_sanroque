@extends('../layouts.site')
@section('sub-title','Business Permit Clearance')

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
            <h2 class="text-center title">Business Permit Clearance</h2>
          </div>
          <div class="col-md-12 text-right">
            <button class="btn btn-primary btn-raised" name="create_record" id="create_record" >Business Permit Clearance</button>
          </div>

          <div class="col-md-12">
            <div class="row p-2">
              
                  @forelse($brgyCertificates as $brgyCertificate)
                    <div class="col-md-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Business Permit Clearance</h5>
                              <h6 class="card-subtitle mb-2 text-muted">{{ \Carbon\Carbon::parse($brgyCertificate->created_at)->isoFormat('MMM Do YYYY')}}</h6>
                              <p class="card-text">{{$brgyCertificate->purpose}}</p>

                                @if($brgyCertificate->status == 0)
                                  <p class="badge badge-warning">Pending</p><br>
                                  <button type="button" name="edit" edit="{{  $brgyCertificate->id ?? '' }}"  class="edit btn btn-sm btn-link text-primary">Edit Info.</button>
                                  <button type="button" name="cancel" cancel="{{  $brgyCertificate->id ?? '' }}"  class="cancel btn btn-sm btn-link text-danger">Cancel</button>
                                @elseif ($brgyCertificate->status == 1)
                                  <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                  <p class="card-text">{{$brgyCertificate->comment}}</p>
                                  <p class="badge badge-success">Approved</p>

                                @elseif ($brgyCertificate->status == 2)
                                  <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                  <p class="card-text">{{$brgyCertificate->comment}}</p>
                                  <p class="badge badge-danger">Decline</p>
                                @elseif ($brgyCertificate->status == 3)
                                  <h6 class="card-subtitle mb-2 text-muted">Admin Comment:</h6>
                                  <p class="card-text">{{$brgyCertificate->comment}}</p>
                                  <p class="badge badge-primary">Claimed</p>
                                @endif

                            
          
                            </div>
                        </div>
                      </div>
                  @empty
                  <div class="col-md-6">
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

  <form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
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
                <div class="form-group">
                  <label for="purpose" id="lblpurpose" class="bmd-label-floating">Purpose <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="4" name="purpose" id="purpose" required></textarea>
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Save" />
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<script> 
  $(document).on('click', '#create_record', function(){
      $('#formModal').modal('show');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid')
      $('.modal-title').text('Add Business Permit Clearance');
      $('#action_button').val('Submit');
      $('#action').val('Add');
      $('#lblpurpose').addClass('bmd-label-floating')
  });


  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('resident.business_permit_clearance.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "business_permit_clearance/" + id;
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
      $('.modal-title').text('Edit Barangay Certificate');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid')
      $('#lblpurpose').removeClass('bmd-label-floating')
      var id = $(this).attr('edit');

      $.ajax({
          url :"/resident/business_permit_clearance/"+id+"/edit",
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
                      url:"business_permit_clearance/"+id,
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
</script>
@endsection