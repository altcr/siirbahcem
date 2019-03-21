@extends("frontend.master")

@section("title"){{$ayar->title}}@endsection
@section("description"){{$ayar->description}}@endsection
@section("keywords"){{$ayar->keywords}}@endsection

@section("icerik")
@php Carbon\Carbon::setLocale('tr'); @endphp

    <div class="col-md-12 p-none">
      <div class="alert alert-danger p-10 mb-10">
        <i class="fa fa-info-circle"></i> <b><span>Merhaba, sitemize bir ŞİİR veya YAZI da sen bırakmak istemez misin? <button class="btn btn-success p-5" id="user-text-add-btn-open"><i class="fa fa-plus"></i> Ekle</button></span></b>
      </div>

      <div class="center-cont-item p-10 mb-10 hidden" id="user-text-add-div">
        <form action='{{action("frontend\PostController@post_user_text_add")}}' method="post">
          {{csrf_field()}}
          <div class="form-group form-float">
            <div class="form-line">
              <p>Kategori</p>
              <select class="form-control" name="kat_id">
                @foreach($categories as $val)
                  <option value="{{$val->kategoriler_id}}">{{$val->baslik}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group form-float">
            <div class="form-line">
              <label class="form-label">Başlık</label>
              <input class="form-control" name="baslik">
            </div>
          </div>
          <div class="form-group form-float">
            <div class="form-line">
              <textarea id="ckeditor" name="icerik"></textarea>
            </div>
          </div>
          <button class="btn btn-success waves-effect" type="submit" id="user-text-add-btn">Kaydet</button>
        </form>
      </div>

      @foreach($siirler as $val)
        <div class="center-cont-item p-10 mb-10">
          <h1 class="center">{{$val->baslik}}</h1>
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
