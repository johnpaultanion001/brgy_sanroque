@extends('../layouts.admin')
@section('sub-title','Announcements')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Manage Announcements</h3>
            </div>
            <div class="col text-right">
              <button type="button" name="create_record" id="create_record" class="text-uppercase create_record btn btn-sm btn-primary">New Announcements</button>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-announcements display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Link Website</th>
                <th scope="col">Created By</th>
                <th scope="col">Date</th>

              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($announcements as $announcement)
                    <tr>
                      <td>
                          <button type="button" name="edit" edit="{{  $announcement->id ?? '' }}"  class="edit  btn btn-sm btn-primary">Edit</button>
                          <button type="button" name="remove" remove="{{  $announcement->id ?? '' }}" class="remove btn btn-sm btn-danger">Remove</button>
                      </td>
                      <td>
                         <img style="vertical-align: bottom;"  height="100" width="100" src="{{URL::asset('/assets/img/announcements/'.$announcement->image)}}" />
                      </td>
                      <td>
                          {{  $announcement->title ?? '' }}
                      </td>
                      <td>
                          {{\Illuminate\Support\Str::limit($announcement->body,50)}}
                      </td>
                      <td>
                          <a target="_blank" href="{{  $announcement->link_website ?? '' }}">{{\Illuminate\Support\Str::limit($announcement->link_website ?? '',30)}} </a>
                      </td>
                      <td>
                          {{  $announcement->user->name ?? '' }}
                      </td>
                      <td>
                          {{ $announcement->created_at->format('M j Y h:i A') }}
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
                    <label for="title" class="bmd-label-floating">Title: <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-title"></strong>
                    </span>
                </div>
                  
                <div class="form-group">
                  <label for="body" id="lblpurpose" class="bmd-label-floating">Body: <span class="text-danger">*</span></label>
                  <textarea class="form-control body" rows="8" name="body" id="body"></textarea>
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-body"></strong>
                  </span>
                </div>

                <div class="form-group">
                    <label for="image" class="bmd-label-floating">Image: <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control image" accept="image/*" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-image"></strong>
                    </span>
                    <div class="current_img pt-4">
                        <div class="row">
                            <div class="col-6">
                            <br>
                            <br>
                            <br>
                                 <small>Current Image:</small>
                            </div>
                            <div class="col-6">
                                 <img style="vertical-align: bottom;" id="current_image"  height="100" width="100" src="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="link_website" class="bmd-label-floating">Link A Website:</label>
                    <input type="text" name="link_website" id="link_website" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-link_website"></strong>
                    </span>
                </div>



                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn btn-link text-primary" value="Save" />
            <button type="button" class="btn text-danger btn-link" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>

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

  $('.datatable-announcements:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

  });


  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.announcements.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "announcements/update/" + id;
        type = "POST";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

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
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                    if(key == 'image'){
                        $('.image').addClass('is-invalid')
                        $('#error-image').text(value)
                    }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('#myForm')[0].reset();
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
                $('#formModal').modal('hide');
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
                      url:"announcements/"+id,
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


$(document).on('click', '#create_record', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add New Announcement');
    $('#action_button').val('Submit');
    $('#action').val('Add');
    $('.current_img').hide();
    
});

$(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Edit Announcements');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.current_img').show();
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/announcements/"+id+"/edit",
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
                if(key == 'image'){
                    $('#current_image').attr("src", '/assets/img/announcements/'  + value);
                }
            })
            $('#hidden_id').val(id);
            $('#action_button').val('Update');
            $('#action').val('Edit');
        }
    })
});



</script>
@endsection
