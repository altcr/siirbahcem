@extends("backend.master")

@section("title"){{"Yönetici/Admin İşlemleri"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Yönetici/Admin İşlemleri"}}@endsection

@section("icerik")

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
    <div class="card">
      <div class="header">
        <div class="col-md-6">
          <h2>
              YÖNETİCİ/ADMİN SAYFASI
              <small>Bu sayfada siteniz için Admin ekleyebilir veya silebilirsiniz.</small>
          </h2>
        </div>
        <div class="align-right">
          <a href="/Panel/admin-add">
            <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float" title="Yeni admin ekle">
                <i class="material-icons">add</i>
            </button>
          </a>
        </div>
      </div>
      <div class="body">
        @if(count($users)==0)
        <div class="alert alert-warning p-20"><i class="material-icons d-center">info</i> Kayıtlı Admin bulunmamaktadır.</div>
        @else
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                  <tr>
                      <th class="col-md-3">Ad</th>
                      <th class="col-md-3">Email</th>
                      <th class="col-md-1">Yetki</th>
                      <th class="col-md-1">Üyelik Tarihi</th>
                      <th class="col-md-2">Sil</th>
                      <th class="col-md-2">Düzenle</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $val)
                  <tr>
                      <td>{{$val->name}}</td>
                      <td>{{$val->email}}</td>
                      <td class="center d-center">@php echo $val->yetki===0 ? '<h4><div class="label label-warning">Kısıtlı Yetki</div></h4>' : '<h4><div class="label label-success">Tam Yetki</div></h4>' @endphp</td>
                      <td class="center d-center">{{date("d/m/Y", strtotime(($val->created_at)))}}</td>
                      <td class="center d-center"><a data-id="{{$val->id}}" id="btn-del-admin"><button class="btn btn-danger"><i class="material-icons">delete</i> Sil</button></td>
                      <td class="center d-center"><a href="admin-update/{{$val->id}}"><button class="btn btn-info"><i class="material-icons">build</i> Düzenle</button></a></td>
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
