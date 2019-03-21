@extends("backend.master")

@section("title"){{"Şifre Yenileme"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Şifre Yenileme"}}@endsection

@section("icerik")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
      <div class="card">
        <div class="header">
          <h2>
              ŞİFRE YENİLEME SAYFASI
              <small>Bu sayfada admin paneline giriş şifrenizi yenileyebilirsiniz.</small>
          </h2>
        </div>
        <div class="body">
          <form action='{{action("backend\PostController@post_sifre_yenile", ["id" => Auth::user()->id])}}' id="form_validation" method="post" novalidate="novalidate" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group form-float">
                <div class="form-line">
                  <label for="Password">Yeni Şifre</label>
                  <input class="form-control" name="password" required="" aria-required="true" type="password">
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                  <label for="Password Again">Yeni Şifre Tekrar</label>
                  <input class="form-control" name="password_again" required="" aria-required="true" type="password">
                </div>
            </div>
            <button class="btn btn-success waves-effect" type="submit">Kaydet</button>
          </form>
        </div>
      </div>
    </div>

@endsection

@section("js")
  @if(session("array_result"))
    <script type="text/javascript">
      swal(
        '<?=session("array_result.sonuc")?>',
        '<?=session("array_result.mesaj")?>',
        '<?=session("array_result.durum")?>',
      )
    </script>
  @endif
@endsection
