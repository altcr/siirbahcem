@extends("backend.master")

@section("title"){{"Yorum İşlemleri"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Yorum İşlemleri"}}@endsection

@section("icerik")

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
    <div class="card">
      <div class="header">
        <h2>
            YORUMLAR SAYFASI
            <small>Bu sayfada Yorumları görüntüleyebilir, onaylayıp silebilirsiniz.</small>
        </h2>
      </div>
      <div class="body">
        @if(count($yorumlar)===0)
        <div class="alert alert-warning p-20"><i class="material-icons d-center">info</i> Onay Bekleyen Yorum bulunmamaktadır.</div>
        @else
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                  <tr>
                      <th class="col-md-2">Yazı/Şiir</th>
                      <th class="col-md-2">Ad</th>
                      <th class="col-md-2">Email</th>
                      <th class="col-md-4">Yorum</th>
                      <th class="col-md-1">Sil</th>
                      <th class="col-md-1">Onayla</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($yorumlar as $val)
                  <tr>
                      <td>{{$val->siir->baslik}}</td>
                      <td>{{$val->ad}}</td>
                      <td>{{$val->email}}</td>
                      <td>{{$val->yorum}}</td>
                      <td class="center d-center"><a data-id="{{$val->yorumlar_id}}" id="btn-del-comment"><button class="btn btn-danger"><i class="material-icons">delete</i> Sil</button><a/></td>
                      <td class="center d-center"><a data-id="{{$val->yorumlar_id}}" id="btn-check-comment"><button class="btn btn-success"><i class="material-icons">check</i> Onayla</button></a></td>
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
