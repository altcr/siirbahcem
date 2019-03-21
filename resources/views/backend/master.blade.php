<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Ali TECER">
    <meta name="description" content='@yield("description")'>
    <meta name="keywords" content='@yield("keywords")'>
    <title>@yield("title")</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/backend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="/backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="/backend/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/backend/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="/backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="/backend/css/style.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/backend/css/themes/all-themes.css" rel="stylesheet" />

</head>

<body class="theme-{{App\SiteAyar::find(1)->tema_renk}}">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Lütfen Bekleyiniz...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
      <div class="container-fluid">
          <div class="navbar-header col-md-3">
              <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
              <a href="javascript:void(0);" class="bars"></a>
              <a class="navbar-brand p-none col-xs-12 col-md-6" href="/" target="_blank">
                <img src="/uploads/img/@php echo App\SiteAyar::find(1)->logo @endphp" alt="Şiirbahçem" class="logo-img col-xs-offset-1 col-md-offset-0 col-lg-offset-0">
              </a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="notification-count-a">
                      <i class="material-icons">notifications</i>
                      <span class="label-count" id="notification-count"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">Bildirimler</li>
                    <li class="body">
                      <ul class="menu" id="notification-ul">
                        <div class="p-5">
                          <div class="icon-circle bg-light-green">
                              <i class="material-icons">comment</i>
                          </div>
                          <div class="menu-info">
                              <h4>Yeni Bildirim Bulunmamaktadır.</h4>
                          </div>
                        </div>
                      </ul>
                    </li>
                  </ul>
                </li>
    					<li>
    						<a href="/Panel/cikis" title="Çıkış">
                    <i class="material-icons">input</i>
                </a>
    					</li>
            </ul>
          </div>
      </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="/backend/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menü</li>
                    <li class="active">
                        <a href="/Panel">
                            <i class="material-icons">home</i>
                            <span>Ana Sayfa</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Panel/texts">
                            <i class="material-icons">text_fields</i>
                            <span>Yazılar/Şiirler</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Panel/text-check">
                            <i class="material-icons">check</i>
                            <span>Yazı/Şiir Onay Ekranı</span>
                        </a>
                    </li>
                    @if(Auth::user()->yetki==1)
                      <li>
                          <a href="/Panel/categories">
                              <i class="material-icons">list</i>
                              <span>Kategori İşlemleri</span>
                          </a>
                      </li>
                    @endif
                    <li>
                        <a href="/Panel/comments">
                            <i class="material-icons">comment</i>
                            <span>Yorum İşlemleri</span>
                        </a>
                    </li>
                    @if(Auth::user()->yetki==1)
                      <li>
                          <a href="/Panel/admin">
                              <i class="material-icons">people</i>
                              <span>Yönetici/Admin İşlemleri</span>
                          </a>
                      </li>
                    @endif
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">settings</i>
                            <span>Ayarlar</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                          <li>
                            <a href="/Panel/sifre-yenile">
                                <span>Şifre Yenile</span>
                            </a>
                          </li>
                          @if(Auth::user()->yetki==1)
                            <li>
                              <a href="/Panel/site-ayar">
                                  <span>Site Ayarları</span>
                              </a>
                            </li>
                            <li>
                              <a href="/Panel/tema">
                                  <span>Tema Renk Seçimi</span>
                              </a>
                            </li>
                          @endif
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="http://www.alitecer.com" target="_blank">Ali TECER</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          <ol class="breadcrumb breadcrumb-bg-{{App\SiteAyar::find(1)->tema_renk}}">
              <li><a href="/Panel">Ana Sayfa</a></li>
              <li class="active">@yield("sayfa")</li>
          </ol>
        </div>

  			<div class="row-clearfix">
          @yield("icerik")
  			</div>

      </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="/backend/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/backend/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/backend/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/backend/plugins/node-waves/waves.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/backend/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- CKEDITOR -->
    <script src="/backend/plugins/ckeditor/ckeditor.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="/backend/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="/js/custom.js"></script>
    <script src="/js/sweetalert2.all.min.js" charset="utf-8" type="text/javascript"></script>
    <script src="/js/sweetalert2.common.js" charset="utf-8" type="text/javascript"></script>
    <script src="/js/sweetalert2.min.js" charset="utf-8" type="text/javascript"></script>

    <script src="/backend/js/admin.js"></script>

    <script src="/backend/js/pages/tables/jquery-datatable.js"></script>
    <script src="/backend/js/pages/forms/form-validation.js"></script>
    <script src="/backend/js/pages/forms/editors.js"></script>
    <script src="/backend/js/demo.js"></script>

    @yield("js")
</body>
</html>
