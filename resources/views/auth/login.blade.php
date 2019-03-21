<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Ali TECER">
    <meta name="description" content='{{$ayar->description}}'>
    <meta name="keywords" content='{{$ayar->keywords}}'>
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Girişi | {{$ayar->title}}</title>

  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img src="/uploads/img/@php echo App\SiteAyar::find(1)->logo @endphp" alt="Şiirbahçem"  class="logo-img-frontend col-xs-offset-1 col-md-offset-0 col-lg-offset-0">
      </div>
      <div class="login-box">
        <form class="login-form" method="post" action="{{ route('login') }}">
          {{ csrf_field() }}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin Paneli Girişi</h3>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label">PASSWORD</label>
            <input id="password" type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">Beni Hatırla</span>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
  </body>
  <script src="/backend/plugins/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="/js/sweetalert2.all.min.js" charset="utf-8" type="text/javascript"></script>
  <script src="/js/sweetalert2.common.js" charset="utf-8" type="text/javascript"></script>
  <script src="/js/sweetalert2.min.js" charset="utf-8" type="text/javascript"></script>
  @if(session("array_result"))
    <script type="text/javascript">
      swal(
        '<?=session("array_result.sonuc")?>',
        '<?=session("array_result.mesaj")?>',
        '<?=session("array_result.durum")?>',
      )
    </script>
  @endif
</html>
