@extends('../layouts.site')
@section('sub-title','Register')

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
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>
                <p class="description text-white text-center">All Field Are Required</p>
              </div>
              <br><br>
              <div class="card-body">
                  <div class="form-group">
                    <label for="name" class="bmd-label-floating">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email" class="bmd-label-floating">Email<span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="contact_number" class="bmd-label-floating">Contact Number<span class="text-danger">*</span></label>
                    <input type="number" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"  value="{{ old('contact_number') }}" required autocomplete="contact_number">
                    @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="address" class="bmd-label-floating">Address <span class="text-danger">*</span></label>
                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required autocomplete="address">
                    @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="date_of_birth" >Date Of Birth <span class="text-danger">*</span></label>
                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="registered_voter" >Registered Voter?<span class="text-danger">*</span></label>
                    <select class="form-control @error('registered_voter') is-invalid @enderror" name="registered_voter" id="registered_voter">
                      <option value="">SELECT</option>
                      <option value="YES">YES</option>
                      <option value="NO">NO</option>
                    </select>
                    @error('registered_voter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password"class="bmd-label-floating" >Password <span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="bmd-label-floating">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password">
                  </div>


                

              </div>
              <br><br><br>
              <div class="footer text-center">
               
                <button type="submit" class="btn btn-primary btn-lg"> Register </button>
              </div>
              <p class="description text-center">Already a member? <a href="/login">Login Now</a> </p>
              <br><br>
            </form>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
 
@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
<script> 
// script
</script>
@endsection