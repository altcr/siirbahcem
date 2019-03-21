<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Siirler;
use App\Yorumlar;
use App\SiteAyar;
use App\Kategoriler;

class GetController extends Controller
{
    public function get_index()
    {
      $site_ayar=SiteAyar::find(1);
      $siirler=Siirler::where('durum', 1)->orderBy("siirler_id","desc")->paginate(10);
      $kategori=Kategoriler::all();
      return view("frontend.index")->with('siirler', $siirler)->with('ayar', $site_ayar)->with('categories', $kategori);
    }

    public function get_detail($slug)
    {
      $siir=Siirler::where('slug', $slug)->first();
      if($siir){
        $site_ayar=SiteAyar::find(1);
        $yorumlar=Yorumlar::where('siir_id', $siir->siirler_id)->where('durum', 1)->orderBy("yorumlar_id", "desc")->get();
        return view("frontend.detail")->with('siir', $siir)->with("yorumlar",$yorumlar)->with('ayar', $site_ayar);
      }
      else{
        return redirect("/");
      }
    }

    public function get_search(Request $request)
    {
      if(isset($request->search) or isset($request->page)){
        $site_ayar=SiteAyar::find(1);
        $aranan=$request->search;
        $onerilen=Siirler::where("durum", 1)->inRandomOrder()->limit(5)->get();
        $search=Siirler::where("durum",1)->where("baslik","like",'%'.$request->search.'%')->where("icerik","like",'%'.$request->search.'%')->paginate(10);
        return view("frontend.search")->with("ayar",$site_ayar)->with('search', $search)->with("aranan",$aranan)->with("onerilen",$onerilen);
      }
      else{
        return redirect('/');
      }
    }

    public function get_category($slug)
    {
      $ayar=SiteAyar::find(1);
      $kategori=Kategoriler::where('slug', $slug)->first();
      if($kategori){
        $siirler=Siirler::where("kat_id",$kategori->kategoriler_id)->where("durum",1)->orderBy("siirler_id","desc")->paginate(10);
        return view("frontend.category", compact("kategori","siirler","ayar"));
      }
      else{
        return redirect("/");
      }
    }

    public function get_comment_add()
    {
      return redirect('/');
    }
}
