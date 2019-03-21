@extends("backend.master")

@section("title"){{"Kategori Ekle"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Kategori Ekle"}}@endsection

@section("icerik")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
      <div class="card">
        <div class="header">
          <h2>
              KATEGORİ EKLEME SAYFASI
              <small>Bu sayfada yeni kategoriler oluşturabilirsiniz.</small>
          </h2>
        </div>
        <div class="body">
          <form action='{{action("backend\PostController@post_category_add")}}' id="form_validation" method="post" novalidate="novalidate">
            {{csrf_field()}}
            <div class="form-group form-float">
              <div class="form-line">
                <p>Durum</p>
                <select class="form-control show-tick" name="durum">
                  <option value="0">Kapalı</option>
                  <option value="1" selected>Açık</option>
                </select>
              </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="baslik" required="" aria-required="true" type="text">
                    <label class="form-label">Başlık</label>
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
