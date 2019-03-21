@extends("backend.master")

@section("title"){{"Admin Ekle"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Admin Ekle"}}@endsection

@section("icerik")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
      <div class="card">
        <div class="header">
          <h2>
              ADMİN EKLEME SAYFASI
              <small>Bu sayfada yeni adminler ekleyebilirsiniz.</small>
          </h2>
        </div>
        <div class="body">
          <form action='{{action("backend\PostController@post_admin_add")}}' id="form_validation" method="post" novalidate="novalidate">
            {{csrf_field()}}
            <input type="hidden" name="remember_token" value="{{csrf_token()}}">
            <div class="form-group form-float">
              <div class="form-line focused">
                <p>Yetki</p>
                <select class="form-control show-tick" name="yetki">
                  <option value="0" selected>Kısıtlı Yetki</option>
                  <option value="1">Tam Yetki</option>
                </select>
              </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="name" required="" aria-required="true" type="text">
                    <label class="form-label">Ad</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="email" required="" aria-required="true" type="email">
                    <label class="form-label">Email</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="password" required="" aria-required="true" type="password">
                    <label class="form-label">Şifre</label>
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
