<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteAyarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_ayar', function (Blueprint $table) {
          $table->increments('ayar_id');
          $table->string('title',100);
          $table->string('description',300);
          $table->string('keywords',100);
          $table->string('siteurl',50);
          $table->string('logo',200);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_ayar');
    }
}
