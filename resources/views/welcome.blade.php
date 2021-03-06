<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SnTracker | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLinks/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLinks/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b>Sn</b>Tracker</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Admin</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{asset('adminLinks/dist/img/user1-128x128.jpg')}}" alt="User Image">

    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password">

        <div class="input-group-append">
            <a href="{{ route('admin.home') }}" class="fas fa-arrow-right text-muted p-2"></a>
          {{-- <button type="button"  class="btn"><i href="{{ route('admin.home') }}" class="fas fa-arrow-right text-muted"></i></button> --}}
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <!-- Enter your password to retrieve your session -->
  </div>
  <div class="text-center">
    <!-- <a href="login.html">Or sign in as a different user</a> -->
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2021 <b><a href="http://www.hsbr-apps.com/" class="text-black">hsbr-apps</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{asset('adminLinks/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLinks/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
