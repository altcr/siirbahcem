@extends("backend.master")

@section("title"){{"Site Ayarları"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Site Ayarları"}}@endsection

@section("icerik")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
      <div class="card">
        <div class="header">
          <h2>
              SİTE AYARLARI DÜZENLEME SAYFASI
              <small>Bu sayfada sitenizle ilgili temel ayarları düzenleyebilirsiniz.</small>
          </h2>
        </div>
        <div class="body">
          <div class="col-md-12 form-group center p-none">
            <img src='@php echo empty($ayar->logo) ? "/backend/images/image-not-found.png" : "/uploads/img/$ayar->logo" @endphp' alt="" class="p-none col-xs-12 col-md-4 col-md-offset-4 col-lg-offset-4">
            @if(empty($ayar->logo))
              <div class="col-md-12">
                <span class="alert alert-danger p-5">Henüz Logo Fotoğrafı Seçilmedi!</span>
              </div>
            @endif
          </div>
          <form action='{{action("backend\PostController@post_site_ayar_update")}}' id="form_validation" method="post" novalidate="novalidate" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="old_img" value="{{$ayar->logo}}">
            <div class="form-group form-float">
                <label for="Logo">Logo</label>
                <input type="file" class="form-control-file" name="logo">
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                  <label for="Title">Site Başlığı(Title)</label>
                  <input class="form-control" name="title" required="" aria-required="true" type="text" value="{{$ayar->title}}">
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                  <label for="Description">Site Açıklaması(Description)</label>
                  <input class="form-control" name="description" required="" aria-required="true" type="text" value="{{$ayar->description}}">
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                  <label for="Keywords">Site Anahtar Kelimeleri(Keywords)</label><br>
                  <input type="text" name="keywords" class="form-control" data-role="tagsinput" required="" aria-required="true" value="{{$ayar->keywords}}">
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                  <label for="Site Url">Site Url</label>
                  <input class="form-control" name="siteurl" required="" aria-required="true" type="text" value="{{$ayar->siteurl}}">
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
