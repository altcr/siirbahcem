@extends("backend.master")

@section("title"){{"Admin Güncelle"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Admin Güncelle"}}@endsection

@section("icerik")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
      <div class="card">
        <div class="header">
          <h2>
              ADMİN GÜNCELLEME SAYFASI
              <small>Bu sayfada kayıtlı admin bilgilerini güncelleyebilirsiniz.</small>
          </h2>
        </div>
        <div class="body">
          <form action='{{action("backend\PostController@post_admin_update", ["id" => $admin->id])}}' id="form_validation" method="post" novalidate="novalidate">
            {{csrf_field()}}
            <div class="form-group form-float">
              <div class="form-line focused">
                <p>Yetki</p>
                <select class="form-control show-tick" name="yetki">
                  <option value="0" @php echo $admin->yetki===0 ? "selected" : "" @endphp>Kısıtlı Yetki</option>
                  <option value="1" @php echo $admin->yetki===1 ? "selected" : "" @endphp>Tam Yetki</option>
                </select>
              </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="name" required="" aria-required="true" type="text" value="{{$admin->name}}">
                    <label class="form-label">Ad</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="email" required="" aria-required="true" type="email" value="{{$admin->email}}">
                    <label class="form-label">Email</label>
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
