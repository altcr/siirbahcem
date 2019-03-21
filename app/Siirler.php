<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siirler extends Model
{
    protected $table="siirler";
    protected $fillable=["kat_id","user_id","baslik","icerik","durum","slug"];
    protected $primaryKey="siirler_id";

    public function kategori()
    {
      return $this->hasOne("App\Kategoriler", "kategoriler_id", "kat_id");
    }

    public function yazar()
    {
      return $this->hasOne("App\User","id","user_id");
    }

    /*public function yorumlar()
    {
      return $this->hasMany("App\Yorumlar","siir_id","siirler_id");
    }*/
}
