<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorumlar extends Model
{
  protected $table="yorumlar";
  protected $fillable=["siir_id","ad","email","yorum","durum"];
  protected $primaryKey="yorumlar_id";

  public function siir()
  {
    return $this->hasOne("App\Siirler","siirler_id","siir_id");
  }
}
