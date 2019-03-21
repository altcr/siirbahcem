<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Ali TECER">
    <meta name="description" content='@yield("description")'>
    <meta name="keywords" content='@yield("keywords")'>
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/css/font-awesome.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
  </head>
  <body>
    <!--Nav Start-->
    <div class="container-fluid p-none">
      <nav class="navbar navbar-fixed navbar-expand-lg fixed-top nav-bg">
        <a class="navbar-brand p-none" href="/">
          <img src="/uploads/img/@php echo App\SiteAyar::find(1)->logo @endphp" alt="Şiirbahçem"  class="logo-img-frontend col-xs-offset-1 col-md-offset-0 col-lg-offset-0">
        </a>
        <button class="navbar-toggler nav-btn" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon pt-5">
            <i class="fa fa-bars"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown nav-li d-block d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategoriler
              </a>
              <div class="dropdown-menu mb-10" aria-labelledby="navbarDropdownMenuLink">
                @foreach(App\Kategoriler::where("durum",1)->get() as $val)
                  <a href="/category/{{$val->slug}}" class="dropdown-item p-10"><i class="fa fa-caret-right"></i> {{$val->baslik}} <span class="badge badge-primary badge-pill">{{count($val->siirler)}}</span></a>
                @endforeach
              </div>
            </li>
          </ul>
          <div class="nav-src">
            <form action='{{action("frontend\GetController@get_search")}}' method="get">
              {{csrf_field()}}
  						<div class="input-group input-group-4">
  							<input class="form-control" name="search" placeholder="Bir kelime ara.." type="text">
  							<span class="input-group-btn">
  								<button type="submit" class="btn btn-danger btn-md"><i class="fa fa-search"></i></button>
  							</span>
  						</div>
  					</form>
          </div>
        </div>
      </nav>
    </div>
    <!--Page Start-->
    <div class="container cont">
      <div class="row">
        <div class="col-md-2 d-sm-block d-none" id="left-cont">
          <div class="list-group m-none">
            <a href="#" class="list-group-item list-group-item-action category-title">KATEGORİLER</a>
            @foreach(App\Kategoriler::where("durum",1)->get() as $val)
              <a href="/category/{{$val->slug}}" class="list-group-item list-group-item-action p-10"><i class="fa fa-caret-right"></i> {{$val->baslik}} <span class="badge badge-primary badge-pill">{{count($val->siirler)}}</span></a>
            @endforeach
          </div>
        </div>
        <div class="col-md-8" id="center-cont">
          @yield("icerik")
        </div>
        <div class="col-md-2 d-sm-block d-none p-none" id="right-cont">
          <div class="tabs mb-5">
            <ul class="nav nav-tabs">
              <li class="nav-item active"><a class="nav-link active" href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Popüler</a></li>
              <li class="nav-item"><a class="nav-link" href="#recentPosts" data-toggle="tab"><i class="fa fa-bookmark"></i> Yeni Eklenen</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="popularPosts">
                <ul class="list-group">
                  @foreach(App\Siirler::where("durum",1)->inRandomOrder()->limit(5)->get() as $val)
                    <li class="list-group-item">
                      <div class="post-info">
                        <a href="/detail/{{$val->slug}}">{{$val->baslik}}</a>
                        <div class="post-meta">
                           {{$val->created_at->diffForHumans()}}
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="tab-pane" id="recentPosts">
                <ul class="list-group">
                  @foreach(App\Siirler::where("durum",1)->orderBy("siirler_id","desc")->limit(5)->get() as $val)
                    <li class="list-group-item">
                      <div class="post-info">
                        <a href="/detail/{{$val->slug}}">{{$val->baslik}}</a>
                        <div class="post-meta">
                           {{$val->created_at->diffForHumans()}}
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Footer Start-->

      <footer class="footer">
        <span>© Copyright 2017 ŞiirBahçem. Tasarım</span>
         <a href="http://alitecer.com" target="_blank">ALİ TECER</a>
      </footer>

    <script src="/backend/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="/js/sweetalert2.all.min.js" charset="utf-8" type="text/javascript"></script>
    <script src="/js/sweetalert2.common.js" charset="utf-8" type="text/javascript"></script>
    <script src="/js/sweetalert2.min.js" charset="utf-8" type="text/javascript"></script>
    <script src="/js/custom.js" charset="utf-8" type="text/javascript"></script>

    <!-- CKEDITOR -->
    <script src="/backend/plugins/ckeditor/ckeditor.js"></script>
    <script src="/backend/js/pages/forms/editors.js"></script>

    @yield("js")

  </body>
</html>
