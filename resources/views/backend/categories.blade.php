@extends("backend.master")

@section("title"){{"Kategoriler"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Kategori İşlemleri"}}@endsection

@section("icerik")

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
    <div class="card">
      <div class="header">
        <div class="col-md-6">
          <h2>
              KATEGORİLER SAYFASI
              <small>Bu sayfada Kategori ekleyebilir, silebilir veya düzenleyebilirsiniz.</small>
          </h2>
        </div>
        <div class="align-right">
          <a href="/Panel/category-add">
            <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float" title="Yeni kategori ekle">
                <i class="material-icons">add</i>
            </button>
          </a>
        </div>
      </div>
      <div class="body">
        @if(count($categories)==0)
        <div class="alert alert-warning p-20"><i class="material-icons d-center">info</i> Kayıtlı yorum bulunmamaktadır.</div>
        @else
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                  <tr>
                      <th class="col-md-7">Başlık</th>
                      <th class="col-md-1">Durum</th>
                      <th class="col-md-2">Sil</th>
                      <th class="col-md-2">Düzenle</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($categories as $val)
                  @if($val->durum==1)
                    @php $durum="Açık"; $renk="success"; @endphp
                  @else
                    @php $durum="Kapalı"; $renk="danger"; @endphp
                  @endif
                  <tr>
                      <td>{{$val->baslik}}</td>
                      <td class="center d-center"><h4><label for="Durum" class="label label-{{$renk}}">{{$durum}}</label></h4></td>
                      <td class="center d-center"><a data-id="{{$val->kategoriler_id}}" id="btn-del-category"><button class="btn btn-danger"><i class="material-icons">delete</i> Sil</button></a></td>
                      <td class="center d-center"><a href="category/update/{{$val->kategoriler_id}}"><button class="btn btn-info"><i class="material-icons">build</i> Düzenle</button></a></td>
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
