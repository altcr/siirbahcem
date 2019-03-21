@extends("frontend.master")

@section("title"){{$siir->baslik}}@endsection
@section("description"){{$ayar->description}}@endsection
@section("keywords"){{$ayar->keywords}}@endsection

@section("icerik")
@php Carbon\Carbon::setLocale('tr'); @endphp

  <div class="col-md-12 p-none">

    <div class="center-cont-item p-10 mb-10">
      <h1 class="center">{{$siir->baslik}}</h1>
        {!!$siir->icerik!!}
      <hr class="my-2">
      <div class="row m-none">
        <div class="col-md-6 left p-5 center-cont-item-spn">
          <span><i class="fa fa-clock-o"></i> {{$siir->created_at->diffForHumans()}}</span>
          @if(isset($siir->yazar->name)) <span><i class="fa fa-user ml-20"></i>  {{$siir->yazar->name}}</span>@endif
          <span><i class="fa fa-folder-open ml-20"></i> {{$siir->kategori->baslik}}</span>
        </div>
        <div class="col-md-6 pr-10 pt-5 right center-cont-item-btn"></div>
      </div>
    </div>

    <div class="center-cont-item p-10 mb-10">
      <div class="post-block post-leave-comment">
				<h3 class="heading-primary">Bir Yorum Yaz</h3>
				<form method="post" id="comment-form">
          {{csrf_field()}}
          <input type="hidden" name="siir_id" value="{{$siir->siirler_id}}">
					<div class="form-row mt-40">
						<div class="form-group col-lg-6">
							<label>Adınız *</label>
							<input value="" maxlength="30" class="form-control" name="ad" id="name" type="text">
						</div>
						<div class="form-group col-lg-6">
							<label>Email Adresiniz *</label>
							<input value="" maxlength="50" class="form-control" name="email" id="email" type="email">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label>Yorumunuz *</label>
							<textarea maxlength="1000" rows="8" class="form-control" name="yorum" id="comment"></textarea>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
              <button type="button" class="btn btn-primary btn-lg" id="comment-add-btn" name="button" data-loading-text="Loading...">Yorum Yap</button>
						</div>
					</div>
				</form>
			</div>
      <hr class="my-2">
      <div class="col-md-12">
        <div><h3><i class="fa fa-comments"></i> Yorumlar({{count($yorumlar)}})</h3></div>
      </div>
      <hr class="my-2">
      <div class="row m-none">
        <div id="comment-add">
        </div>
        @if(count($yorumlar)>0)
          @foreach($yorumlar as $val)
            <div class="col-md-8 comment-item-cont ml-15 mb-10">
              <div class="ok"></div>
              <div><h5>{{$val->ad}}</h5></div>
              <div>{{$val->yorum}}</div>
              <div class="right"><i class="fa fa-clock-o"></i> {{$siir->created_at->diffForHumans()}}</div>
            </div>
          @endforeach
        @else
          <div class="col-md-12 p-20 alert alert-info"><i class="fa fa-info-circle"></i> Henüz yorum yapılmamıştır.</div>
        @endif
      </div>
    </div>
  </div>
@endsection
