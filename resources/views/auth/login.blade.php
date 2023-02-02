<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | bdrentz</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
    <link href="{{asset('backend/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/demo/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('backend/imates/favicon.png')}}" />
  </head>
  <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" > 

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background: #f1f1f1">
        <div class="m-grid__item m-grid__item--fluid  m-login__wrapper">
          <div class="m-login__container" style=" padding: 30px; border: 1px solid #ddd; background: #fff;">
            <div class="m-login__logo">
              {{-- <a href="#"> <img src="{{asset('backend/images/')}}" width="200px"> </a> --}}
              <a href="#"> <img src="https://bdrentz.com/images/backend_images/BdRentz-logo.png" width="200px" height="85px" > </a>
            </div> 
            
            <div class="m-login__signin"> 
                @isset($url)
                  {!! Form::open(['url'=>'bdrentz-login/'.$url]) !!} 
                @else
                  {!! Form::open(['route'=>'login']) !!} 
                @endisset

                <div class="form-group m-form__group">
                  <input class="form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="Email" name="email" autocomplete="off">

                   @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group m-form__group">
                  <input class="form-control m-input m-login__form-input--last {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password">
                   @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif   
                </div>
                <div class="row m-login__form-sub">
                  <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox  m-checkbox--focus">
                      <input type="checkbox" name="remember"> Remember me
                      <span></span>
                    </label>
                  </div>
                  <div class="col m--align-right m-login__form-right">
                    @if(!isset($url))
                        <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                    @endif                      
                  </div>
                </div>
                <div class="m-login__form-action text-center pt30">
                  <button type="submit"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
                  @if(!isset($url))
                  <a href="{{route('customers-register')}}" id="register_customer" class="btn m-btn m-btn--pill btn-accent m-btn--custom m-btn--air m-login__btn m-login__btn--secondary">Register Free</a>
                  @endif
                </div>
              {!! Form::close() !!}
            </div>
            
            <div class="m-login__forget-password">
              <div class="m-login__head">
                <h3 class="m-login__title">Forgotten Password ?</h3>
                <div class="m-login__desc">Enter your email to reset your password:</div>
              </div>
              <form class="m-login__form m-form" action="">
                <div class="form-group m-form__group">
                  <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                </div>
                <div class="m-login__form-action">
                  <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">Request</button>&nbsp;&nbsp;
                  <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('backend/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/demo/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/login.js')}}" type="text/javascript"></script>
    <script> 
      @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
      @endif

      @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
      @endif

      @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
      @endif

      @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
      @endif 
    </script>

    @if(!session()->has('lenguage'))
      {{ setLanguage() }}
      <script>  location.reload(); </script> 
    @endif
  </body>
</html>