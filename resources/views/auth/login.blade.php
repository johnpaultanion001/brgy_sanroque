@extends('../layouts.site')
@section('sub-title','Login')

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
        <div class="col-lg-6 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
                <p class="description text-white text-center">Your Credentials</p>
              </div>
              <br><br>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                  <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-current_password" style="float: right; margin-left: -25px; margin-top: 10px; position: relative; z-index: 2;"></span>   
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group d-flex justify-content-center mt-4">
                  @if ($errors->has('g-recaptcha-response'))
                  <span class="help-block text-danger">
                    <strong>Please verify that you are not a robot.</strong>
                  </span>
                  @endif
                  {!! NoCaptcha::renderJs() !!}
                  {!! NoCaptcha::display() !!}
                </div>
              </div>
              <br><br><br>
              <div class="footer text-center">
               
                <button type="submit" class="btn btn-primary btn-lg"> Login </button>
              </div>
              <p class="description text-center">Not a member? <a href="{{ route('register') }}">Register Now</a> </p>
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
$("body").on('click', '.toggle-current_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});
</script>
@endsection