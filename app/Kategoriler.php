<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
  protected $table="kategoriler";
  protected $fillable=["baslik","durum","slug"];
  protected $primaryKey="kategoriler_id";

  public function siirler()
  {
    return $this->hasMany("App\Siirler","kat_id","kategoriler_id");
  }
}
