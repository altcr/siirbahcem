<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Siirler;
use App\User;
use App\SiteAyar;
use App\Yorumlar;
use App\Kategoriler;

use Carbon\Carbon;
use Validator;

class PostController extends Controller
{
    public function array_result($sonuc,$mesaj,$durum)
    {
      $array_result=[
        "sonuc" => $sonuc,
        "mesaj" => $mesaj,
        "durum" => $durum
      ];
      return $array_result;
    }

    public function post_text_add(Request $request)
    {
      $validator=Validator::make($request->all(), [
        "icerik" => "required"
      ]);

      if($validator->fails()){
        return redirect()->back()->with("array_result", $this->array_result("HATALI","Lütfen bir içerik giriniz!","error"));
      }
      else{
        $slug=str_slug($request->baslik)."-".str_slug(date("d-m-y"));
        $request->merge([
         "user_id" => Auth::user()->id,
         "slug" => $slug
        ]);

        $result=Siirler::create($request->all());
        if($result){
          return redirect("Panel/texts")->with("array_result", $this->array_result("BAŞARILI","Yazı başarıyla eklendi.","success"));
        }
        else{
          return redirect("Panel/texts")->with("array_result", $this->array_result("HATALI","Yazı eklenirken bir hata oluştu!","error"));
        }
      }
    }

    public function post_category_add(Request $request)
    {
        $slug=str_slug($request->baslik)."-".str_slug(date("d-m-y"));
        $request->merge([
         "slug" => $slug
        ]);

        $result=Kategoriler::create($request->all());
        if($result){
          return redirect("Panel/categories")->with("array_result", $this->array_result("BAŞARILI","Kategori başarıyla eklendi.","success"));
        }
        else{
          return redirect("Panel/categories")->with("array_result", $this->array_result("HATALI","Kategori eklenirken bir hata oluştu!","error"));
        }
    }

    public function post_admin_add(Request $request)
    {
      $control=User::where("email", $request->email)->get();

      if(count($control)>0){
        return redirect()->back()->with("array_result", $this->array_result("HATALI","Aynı email hesabına sahip kullanıcı bulunmaktadır!","error"));
      }
      else{
        $request->merge([
         "password" => bcrypt($request->password)
        ]);

        $result=User::create($request->all());
        if($result){
          return redirect("Panel/admin")->with("array_result", $this->array_result("BAŞARILI","Admin başarıyla eklendi.","success"));
        }
        else{
          return redirect("Panel/admin")->with("array_result", $this->array_result("HATALI","Admin eklenirken bir hata oluştu!","error"));
        }
      }
    }

    public function post_admin_update(Request $request, $id)
    {
      if(is_numeric($id)){
        $control=User::where("id", $id)->get();
        if(count($control)>0){
          $result=User::find($id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "yetki" => $request->yetki
          ]);
          if($result){
            return redirect("Panel/admin")->with("array_result", $this->array_result("BAŞARILI","Admin başarıyla güncellendi.","success"));
          }
          else{
            return redirect("Panel/admin")->with("array_result", $this->array_result("HATALI","Admin güncellenirken bir hata oluştu!","error"));
          }
        }
        else{
          return redirect("Panel/admin");
        }
      }
      else{
        return redirect("Panel/admin");
      }
    }

    public function post_text_del($id)
    {
      if(is_numeric($id)){
        $control=Siirler::where("siirler_id",$id)->first();
        if(count($control)>0){
          $result=Siirler::where("siirler_id",$id)->delete();
          if($result){
            Yorumlar::where("siir_id", $id)->delete();
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/texts");
        }
      }
      else{
        return redirect("/Panel/texts");
      }
    }

    public function post_user_text_del($id)
    {
      if(is_numeric($id)){
        $control=Siirler::where("siirler_id",$id)->first();
        if(count($control)>0){
          $result=Siirler::where("siirler_id",$id)->delete();
          if($result){
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/text-check");
        }
      }
      else{
        return redirect("/Panel/text-check");
      }
    }

    public function post_user_text_check($id)
    {
      if(is_numeric($id)){
        $control=Siirler::where("siirler_id",$id)->first();
        if(count($control)>0){
          $result=Siirler::where("siirler_id",$id)->update([
            "durum" => 1
          ]);
          if($result){
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/text-check");
        }
      }
      else{
        return redirect("/Panel/text-check");
      }
    }

    public function post_category_del($id)
    {
      if(is_numeric($id)){
        $control=Kategoriler::where("kategoriler_id",$id)->first();
        if(count($control)>0){
          $result=Kategoriler::where("kategoriler_id",$id)->delete();
          if($result){
            $siirler_id=Siirler::where("kat_id",$id)->get();
            foreach ($siirler_id as $value) {
              Siirler::where("siirler_id", $value->siirler_id)->delete();
              Yorumlar::where("siir_id", $value->siirler_id)->delete();
            }
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/categories");
        }
      }
      else{
        return redirect("/Panel/categories");
      }
    }

    public function post_admin_del($id)
    {
      if(is_numeric($id)){
        $control=User::where("id",$id)->first();
        if(count($control)>0){
          $result=User::where("id",$id)->delete();
          if($result){
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/admin");
        }
      }
      else{
        return redirect("/Panel/admin");
      }
    }

    public function post_comment_del($id)
    {
      if(is_numeric($id)){
        $control=Yorumlar::where("yorumlar_id",$id)->first();
        if(count($control)>0){
          $result=Yorumlar::where("yorumlar_id",$id)->delete();
          if($result){
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/comments");
        }
      }
      else{
        return redirect("/Panel/comments");
      }
    }

    public function post_comment_check($id)
    {
      if(is_numeric($id)){
        $control=Yorumlar::where("yorumlar_id",$id)->first();
        if(count($control)>0){
          $result=Yorumlar::where("yorumlar_id",$id)->update([
            "durum" => 1
          ]);
          if($result){
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return redirect("/Panel/comments");
        }
      }
      else{
        return redirect("/Panel/comments");
      }
    }

    public function post_text_update(Request $request,$id)
    {
      $validator=Validator::make($request->all(), [
        "icerik" => "required"
      ]);

      if($validator->fails()){
        return redirect()->back()->with("array_result", $this->array_result("HATALI","Lütfen bir içerik giriniz!","error"));
      }
      else{
        $slug=str_slug($request->baslik)."-".str_slug(date("d-m-y"));
        $request->merge([
         "slug" => $slug
        ]);

        unset($request["_token"]);
        $result=Siirler::where("siirler_id", $id)->update($request->all());
        if($result){
          return redirect("Panel/texts")->with("array_result", $this->array_result("BAŞARILI","Yazı başarıyla güncellendi.","success"));
        }
        else{
          return redirect("Panel/texts")->with("array_result", $this->array_result("HATALI","Yazı güncellenirken bir hata oluştu!","error"));
        }
      }
    }

    public function post_category_update(Request $request,$id)
    {
      $slug=str_slug($request->baslik)."-".str_slug(date("d-m-y"));
      $request->merge([
       "slug" => $slug
      ]);

      $result=Kategoriler::find($id)->update($request->all());
      if($result){
        return redirect("Panel/categories")->with("array_result", $this->array_result("BAŞARILI","Kategori başarıyla güncellendi.","success"));
      }
      else{
        return redirect("Panel/categories")->with("array_result", $this->array_result("HATALI","Kategori güncellenirken bir hata oluştu!","error"));
      }
    }

    public function post_site_ayar_update(Request $request)
    {
      $validator=Validator::make($request->all(), [
        "logo" => 'mimes:jpg,jpeg,png'
      ]);

      if($validator->fails()){
        return redirect()->back()->with("array_result", $this->array_result("HATALI","Lütfen JPG, JPEG veya PNG uzantılı fotoğraf yükleyiniz!","error"));
      }
      else{
        if(!$request->hasFile("logo")){
          unset($request["logo"]);
          $img_ad=$request->old_img;
        }
        else{
          $old_img=$request->old_img;
          unset($request["old_img"]);

          $img = Input::file("logo"); // Seçilen fotoyu alıyoruz.
          $uzanti = $img->getClientOriginalExtension(); // Seçilen fotonun uzantısını alıyoruz.
          $img_ad = sha1(md5(rand(0,1000))).".".$uzanti; // Yeni bir ad veriyoruz.
          Storage::disk("uploads")->makeDirectory("img"); // Disk ile public içerisinde ki uploads klasörünü seçip, makeDirectory ile img klasörü oluşturuyoruz.
          Image::make($img->getRealPath())->resize(200,45)->save("uploads/img/".$img_ad);
        }


        $result=SiteAyar::find(1)->update([
          "title" => $request->title,
          "description" => $request->description,
          "keywords" => $request->keywords,
          "siteurl" => $request->siteurl,
          "logo" => $img_ad
        ]);

        if($result){
          if($request->hasFile("logo")){
            unlink("uploads/img/".$old_img);
          }
          return redirect("Panel/site-ayar")->with("array_result", $this->array_result("BAŞARILI","Site ayarları başarıyla güncellendi.","success"));
        }
        else{
          unlink("uploads/img/".$img_ad);
          return redirect()->back()->with("array_result", $this->array_result("HATALI","Bir hata oluştu.","error"));
        }
      }
    }

    public function post_sifre_yenile(Request $request ,$id)
    {
      if(is_numeric($id)){
        if($request->password === $request->password_again){
          $result=User::find($id)->update([
            "password" => bcrypt($request->password)
          ]);

          if($result){
            Auth::logout();
            return redirect("/giris")->with("array_result", $this->array_result("BAŞARILI","Şifre başarıyla değiştirildi, lütfen tekrar giriş yapınız.","success"));
          }
          else{
            return redirect()->back()->with("array_result", $this->array_result("HATALI","Bir hata oluştu.","error"));
          }
        }
        else{
          return redirect()->back()->with("array_result", $this->array_result("HATALI","Şifreler eşleşmiyor!","error"));
        }
      }
    }

    public function get_tema_renk($renk)
    {
      $result=SiteAyar::where("ayar_id", 1)->update([
        "tema_renk" => $renk
      ]);
      if($result){
        return 1;
      }
    }
}
