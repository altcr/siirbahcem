<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiirlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siirler', function ($table) {
            $table->increments('siirler_id');
            $table->integer('kat_id');
            $table->integer('user_id');
            $table->string('slug');
            $table->string('baslik',50);
            $table->text('icerik',5000);
            $table->integer('durum')->default(1);
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
        Schema::dropIfExists('siirler');
    }
}
