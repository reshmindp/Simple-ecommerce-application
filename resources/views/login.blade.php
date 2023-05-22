<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Welcome</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="POST" action="">
          @csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            {!!$errors->first('firstname', '<span style="color:red">:message</span>')!!}
            <input class="form-control" value="{{old('username')}}" name="username" type="text" placeholder="Enter Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            {!!$errors->first('password', '<span style="color:red">:message</span>')!!}
            <input class="form-control" value="{{old('password')}}" name="password" type="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip"></a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>

          @if(Session::has('error'))
          <br>
          <div style="color: red;">
          <strong>Alert! </strong>{{Session::get('error')}}</div>
          @endif

          @if(Session::has('success'))
          <br>
          <div style="color: green;">
          <strong>Success! </strong>{{Session::get('success')}}</div>
          @endif

        </form>
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('public/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('public/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
       
      

    </script>

    @if(Session::has('errorfound'))
    {
      <script type="text/javascript">
      $('.login-box').toggleClass('flipped');
      </script>
    }
    @endif
  </body>
</html>