@extends("frontend.master")

@section("title"){{$kategori->baslik}} | {{$ayar->title}}@endsection
@section("description"){{$ayar->description}}@endsection
@section("keywords"){{$ayar->keywords}}@endsection

@section("icerik")
@php Carbon\Carbon::setLocale('tr'); @endphp

    <div class="col-md-12 p-none">
      @foreach($siirler as $val)
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
            <div class="col-md-6 pr-10 pt-5 right center-cont-item-btn"><a class="btn btn-primary" href="/detail/{{$val->slug}}">Devamını Oku..</a></div>
          </div>
        </div>
      @endforeach
      <div class="pagination-align col-md-12 mt-10 mb-10">
        {!!$siirler->links()!!}
      </div>
    </div>

@endsection
