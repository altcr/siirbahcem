@extends("frontend.master")

@section("title"){{$ayar->title}}@endsection
@section("description"){{$ayar->description}}@endsection
@section("keywords"){{$ayar->keywords}}@endsection

@section("icerik")
@php Carbon\Carbon::setLocale('tr'); @endphp

    <div class="col-md-12 p-none">
      @if(count($search)>0)
        <div class="alert alert-success p-20"><b><i class="fa fa-info-check"></i> {{"Aranan Kelime : '$aranan', Dönderilen Sonuç : ".count($search)}}</b></div>
        @foreach($search as $val)
          <div class="center-cont-item p-10 mb-10">
            <h1 class="center">{{$val->baslik}}!</h1>
              {!!substr($val->icerik,0,500).'...'!!}
            <hr class="my-2">
            <div class="row m-none">
              <div class="col-md-6 left pl-10 pt-10 center-cont-item-spn">
                <span><i class="fa fa-clock-o"></i> {{$val->created_at->diffForHumans()}}</span>
                @if(isset($val->yazar->name)) <span><i class="fa fa-user ml-20"></i>  {{$val->yazar->name}}</span>@endif
                <span><i class="fa fa-folder-open ml-20"></i> {{$val->kategori->baslik}}</span>
              </div>
              <div class="col-md-6 pr-10 pt-5 right center-cont-item-btn"><a class="btn btn-primary" href="detail/{{$val->slug}}">Devamını Oku..</a></div>
            </div>
          </div>
        @endforeach
        <div class="pagination-align col-md-12 mt-10 mb-10">
          {!!$search->links()!!}
        </div>
      @else
        <div class="alert alert-danger p-20"><b><i class="fa fa-info-circle"></i> {{"Aranan Kelime : '$aranan', Dönderilen Sonuç : ".count($search)}}</b></div>
        <div class="alert alert-info p-20"><b><i class="fa fa-thumbs-up"></i> {{"Sizin için seçtiğimiz şiirleri okuyabilirsiniz."}}</b></div>
        @foreach($onerilen as $val)
          <div class="center-cont-item p-10 mb-10">
            <h1 class="center">{{$val->baslik}}!</h1>
              {!!substr($val->icerik,0,500).'...'!!}
            <hr class="my-2">
            <div class="row m-none">
              <div class="col-md-6 left pl-10 pt-10 center-cont-item-spn">
                <span><i class="fa fa-clock-o"></i> {{$val->created_at->diffForHumans()}}</span>
                @if(isset($val->yazar->name)) <span><i class="fa fa-user ml-20"></i>  {{$val->yazar->name}}</span>@endif
                <span><i class="fa fa-folder-open ml-20"></i> {{$val->kategori->baslik}}</span>
              </div>
              <div class="col-md-6 pr-10 pt-5 right center-cont-item-btn"><a class="btn btn-primary" href="detail/{{$val->slug}}">Devamını Oku..</a></div>
            </div>
          </div>
        @endforeach
      @endif
    </div>

@endsection
