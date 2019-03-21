@extends("backend.master")

@section("title"){{"Yazı/Şiir İşlemleri"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Yazı/Şiir İşlemleri"}}@endsection

@section("icerik")

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
    <div class="card">
      <div class="header">
        <h2>
            YAZI/ŞİİR ONAY SAYFASI
            <small>Bu sayfada kullanıcı tarafından eklenen yazı veya şiirleri görüntüleyebilir, onaylayıp silebilirsiniz.</small>
        </h2>
      </div>
      <div class="body">
        @if(count($siirler)===0)
        <div class="alert alert-warning p-20"><i class="material-icons d-center">info</i> Onay Bekleyen Yorum bulunmamaktadır.</div>
        @else
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                  <tr>
                      <th class="col-md-2">Başlık</th>
                      <th class="col-md-2">Kategori</th>
                      <th class="col-md-5">İçerik</th>
                      <th class="col-md-1">Detay</th>
                      <th class="col-md-1">Sil</th>
                      <th class="col-md-1">Onayla</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($siirler as $val)
                  <tr>
                      <td>{{$val->baslik}}</td>
                      <td>{{$val->kategori->baslik}}</td>
                      <td>{!!substr($val->icerik,0,130).'...'!!}</td>
                      <td class="center d-center"><a data-id="{{$val->siirler_id}}" id="btn-det-user-txt"><button class="btn btn-info"><i class="material-icons">info</i> Detay</button><a/></td>
                      <td class="center d-center"><a data-id="{{$val->siirler_id}}" id="btn-del-user-txt"><button class="btn btn-danger"><i class="material-icons">delete</i> Sil</button><a/></td>
                      <td class="center d-center"><a data-id="{{$val->siirler_id}}" id="btn-check-user-txt"><button class="btn btn-success"><i class="material-icons">check</i> Onayla</button></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
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
