@extends("backend.master")

@section("title"){{"Kategori Güncelle"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Kategori Güncelle"}}@endsection

@section("icerik")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
      <div class="card">
        <div class="header">
          <h2>
              KATEGORİ GÜNCELLEME SAYFASI
              <small>Bu sayfada kategorileri güncelleyebilirsiniz.</small>
          </h2>
        </div>
        <div class="body">
          <form action='{{action("backend\PostController@post_category_update", ["id" => $category->kategoriler_id])}}' id="form_validation" method="post" novalidate="novalidate">
            {{csrf_field()}}
            <div class="form-group form-float">
              <div class="form-line">
                <p>Durum</p>
                <select class="form-control show-tick" name="durum">
                  <option value="0">Kapalı</option>
                  <option value="1" @php echo $category->durum===1 ? "selected" : "" @endphp>Açık</option>
                </select>
              </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input class="form-control" name="baslik" required="" aria-required="true" type="text" value="{{$category->baslik}}">
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
