<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siirler;
use App\SiteAyar;
use App\Yorumlar;
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

    public function post_user_text_add(Request $request)
    {
      $validator=Validator::make($request->all(), [
        "baslik" => "required",
        "icerik" => "required"
      ]);

      if($validator->fails()){
        return redirect()->back()->with("array_result", $this->array_result("HATALI","Lütfen boş alan bırakmayınız!","error"));
      }
      else{
        $slug=str_slug($request->baslik)."-".str_slug(date("d-m-y"));
        $request->merge([
         "user_id" => 0,
         "durum" => 0,
         "slug" => $slug
        ]);

        $result=Siirler::create($request->all());
        if($result){
          return redirect("/")->with("array_result", $this->array_result("BAŞARILI","Yazı başarıyla eklendi. Onay sürecinden sonra en kısa sürede yayınlanacaktır.","success"));
        }
        else{
          return redirect("/")->with("array_result", $this->array_result("HATALI","Yazı eklenirken bir hata oluştu!","error"));
        }
      }
    }

    public function post_comment_add(Request $request)
    {
      $id=$request->siir_id;
      if(is_numeric($id)){
        $control=Siirler::find($id);
        if($control){
          $validator=Validator::make($request->all(), [
            "ad" => "required|max:30",
            "email" => "required|max:50",
            "yorum" => "required|max:300"
          ]);

          if($validator->fails()){
            return "Empty";
          }
          else{
            $result=Yorumlar::create($request->all());
            if($result){
              return "Ok";
            }
            else{
              return "Error";
            }
          }
        }
        else{
          return redirect("/");
        }
      }
      else{
        return redirect("/");
      }
    }
}
