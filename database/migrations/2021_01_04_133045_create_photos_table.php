<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->integer('type');
            // type 1 == main catalog picture, type == 2, subproduct item picture. I did that to use the same table for both items.
            $table->integer('catalogo_id')->unsigned()->nullable()->foreign('catalogo_id')->references('id')->on('catalogos');
            $table->integer('marca_id')->unsigned()->nullable()->foreign('marca_id')->references('id')->on('marcas');
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
        Schema::dropIfExists('photos');
    }


}
