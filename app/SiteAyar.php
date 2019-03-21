<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteAyar extends Model
{
  protected $table="site_ayar";
  protected $fillable=["title","description","keywords","siteurl","logo"];
  protected $primaryKey="ayar_id";
}
