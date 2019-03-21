@extends("backend.master")

@section("title"){{"Tema Renk Seçimi"}} | {{$ayar->title}}@endsection

@section("description"){{$ayar->description}}@endsection

@section("keywords"){{$ayar->keywords}}@endsection

@section("sayfa"){{"Tema Renk Seçimi"}}@endsection

@section("icerik")

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-none">
    <div class="card">
      <div class="header">
        <h2>
            TEMA RENK SEÇİMİ SAYFASI
            <small>Bu sayfada temanız için yeni bir renk belirleyebilirsiniz.</small>
        </h2>
      </div>
      <div class="body">
        <ul class="demo-choose-skin" id="tema-color">
            <li data-theme="red" @php echo App\SiteAyar::find(1)->tema_renk=='red' ? 'class="active"' : "" @endphp>
                <div class="red"></div>
                <span>Red</span>
            </li>
            <li data-theme="pink" @php echo App\SiteAyar::find(1)->tema_renk=='pink' ? 'class="active"' : "" @endphp>
                <div class="pink"></div>
                <span>Pink</span>
            </li>
            <li data-theme="purple" @php echo App\SiteAyar::find(1)->tema_renk=='purple' ? 'class="active"' : "" @endphp>
                <div class="purple"></div>
                <span>Purple</span>
            </li>
            <li data-theme="deep-purple" @php echo App\SiteAyar::find(1)->tema_renk=='deep-purple' ? 'class="active"' : "" @endphp>
                <div class="deep-purple"></div>
                <span>Deep Purple</span>
            </li>
            <li data-theme="indigo" @php echo App\SiteAyar::find(1)->tema_renk=='indigo' ? 'class="active"' : "" @endphp>
                <div class="indigo"></div>
                <span>Indigo</span>
            </li>
            <li data-theme="blue" @php echo App\SiteAyar::find(1)->tema_renk=='blue' ? 'class="active"' : "" @endphp>
                <div class="blue"></div>
                <span>Blue</span>
            </li>
            <li data-theme="light-blue" @php echo App\SiteAyar::find(1)->tema_renk=='light-blue' ? 'class="active"' : "" @endphp>
                <div class="light-blue"></div>
                <span>Light Blue</span>
            </li>
            <li data-theme="cyan" @php echo App\SiteAyar::find(1)->tema_renk=='cyan' ? 'class="active"' : "" @endphp>
                <div class="cyan"></div>
                <span>Cyan</span>
            </li>
            <li data-theme="teal" @php echo App\SiteAyar::find(1)->tema_renk=='teal' ? 'class="active"' : "" @endphp>
                <div class="teal"></div>
                <span>Teal</span>
            </li>
            <li data-theme="green" @php echo App\SiteAyar::find(1)->tema_renk=='green' ? 'class="active"' : "" @endphp>
                <div class="green"></div>
                <span>Green</span>
            </li>
            <li data-theme="light-green" @php echo App\SiteAyar::find(1)->tema_renk=='light-green' ? 'class="active"' : "" @endphp>
                <div class="light-green"></div>
                <span>Light Green</span>
            </li>
            <li data-theme="lime" @php echo App\SiteAyar::find(1)->tema_renk=='lime' ? 'class="active"' : "" @endphp>
                <div class="lime"></div>
                <span>Lime</span>
            </li>
            <li data-theme="yellow" @php echo App\SiteAyar::find(1)->tema_renk=='yellow' ? 'class="active"' : "" @endphp>
                <div class="yellow"></div>
                <span>Yellow</span>
            </li>
            <li data-theme="amber" @php echo App\SiteAyar::find(1)->tema_renk=='amber' ? 'class="active"' : "" @endphp>
                <div class="amber"></div>
                <span>Amber</span>
            </li>
            <li data-theme="orange" @php echo App\SiteAyar::find(1)->tema_renk=='orange' ? 'class="active"' : "" @endphp>
                <div class="orange"></div>
                <span>Orange</span>
            </li>
            <li data-theme="deep-orange" @php echo App\SiteAyar::find(1)->tema_renk=='deep-orange' ? 'class="active"' : "" @endphp>
                <div class="deep-orange"></div>
                <span>Deep Orange</span>
            </li>
            <li data-theme="brown" @php echo App\SiteAyar::find(1)->tema_renk=='brown' ? 'class="active"' : "" @endphp>
                <div class="brown"></div>
                <span>Brown</span>
            </li>
            <li data-theme="grey" @php echo App\SiteAyar::find(1)->tema_renk=='grey' ? 'class="active"' : "" @endphp>
                <div class="grey"></div>
                <span>Grey</span>
            </li>
            <li data-theme="blue-grey" @php echo App\SiteAyar::find(1)->tema_renk=='blue-grey' ? 'class="active"' : "" @endphp>
                <div class="blue-grey"></div>
                <span>Blue Grey</span>
            </li>
        </ul>
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
