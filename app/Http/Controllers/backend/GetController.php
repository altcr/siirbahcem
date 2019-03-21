<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Kategoriler;
use App\Siirler;
use App\SiteAyar;
use App\Yorumlar;
use App\User;

class GetController extends Controller
{
    public function ayar()
    {
      $ayar=SiteAyar::find(1);
      return $ayar;
    }

    public function get_index()
    {
      return view("backend.index");
    }

    //CATEGORIES CODE
    public function get_category()
    {
      $categories=Kategoriler::all();
      return view("backend.categories")->with("categories",$categories)->with('ayar', $this->ayar());
    }

    public function get_category_add()
    {
      return view("backend.category-add")->with('ayar', $this->ayar());
    }

    public function get_category_update($id)
    {
      if(is_numeric($id)){
        $control=Kategoriler::find($id);
        if(count($control)>0){
          return view("backend.category-update")->with('ayar', $this->ayar())->with('category', $control);
        }
        else{
          return redirect('/Panel/texts');
        }
      }
      else{
        return redirect('/Panel/texts');
      }
    }

    //COMMENTS CODE
    public function get_comment()
    {
      $yorumlar=Yorumlar::where("durum",0)->get();
      return view("backend.comments")->with("yorumlar",$yorumlar)->with('ayar', $this->ayar());
    }

    //ADMIN CODE
    public function get_admin()
    {
      $users=User::all();
      return view("backend.admin")->with("users",$users)->with('ayar', $this->ayar());
    }

    public function get_admin_add()
    {
      return view("backend.admin-add")->with('ayar', $this->ayar());
    }

    public function get_admin_update($id)
    {
      if(is_numeric($id)){
        $control=User::find($id);
        if(count($control)>0){
          return view("backend.admin-update")->with('ayar', $this->ayar())->with('admin', $control);
        }
        else{
          return redirect('/Panel/admin');
        }
      }
      else{
        return redirect('/Panel/admin');
      }
    }

    //TEXTS CODE
    public function get_text()
    {
      $texts=Siirler::where('durum', 1)->get();
      return view("backend.texts")->with("texts",$texts)->with('ayar', $this->ayar());
    }

    public function get_text_add()
    {
      $categories=Kategoriler::where("durum",1)->get();
      return view("backend.text-add")->with('ayar', $this->ayar())->with('categories', $categories);
    }

    public function get_text_check()
    {
      $siirler=Siirler::where('durum', 0)->get();
      return view("backend.text-check")->with('ayar', $this->ayar())->with('siirler', $siirler);
    }

    public function get_text_update($id)
    {
      if(is_numeric($id)){
        $control=Siirler::find($id);
        if(count($control)>0){
          $categories=Kategoriler::where("durum",1)->get();
          return view("backend.text-update")->with('ayar', $this->ayar())->with('text', $control)->with('categories', $categories);
        }
        else{
          return redirect('/Panel/texts');
        }
      }
      else{
        return redirect('/Panel/texts');
      }
    }

    public function get_bildirim_takip()
    {
        $bildirim=Yorumlar::where("bildirim_durum",0)->get();
        if(count($bildirim)>0){
          return $bildirim;
        }
        else{
          return "No";
        }
    }

    public function get_bildirim_sifirlama()
    {
        $bildirim=Yorumlar::where("bildirim_durum",0)->update([
          "bildirim_durum" => 1
        ]);
        if($bildirim){
          return "1";
        }
        else{
          return "0";
        }
    }

    public function get_admin_giris()
    {
      if(Auth::check()){
        return redirect("/Panel");
      }
      return view("auth.login")->with("ayar",$this->ayar());
    }

    public function get_admin_cikis()
    {
      Auth::logout();
      return Redirect("/giris");
    }

    public function get_site_ayar()
    {
      return view("backend.site-ayar")->with('ayar', $this->ayar());
    }

    public function get_sifre_yenile()
    {
      return view("backend.sifre-yenile")->with('ayar', $this->ayar());
    }

    public function get_tema()
    {
      return view("backend.tema")->with('ayar', $this->ayar());
    }

}
