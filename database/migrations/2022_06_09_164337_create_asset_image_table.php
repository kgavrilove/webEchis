<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_image', function (Blueprint $table) {
            $table->primary(['asset_id','image_id']);
            $table->bigInteger('asset_id')->unsigned();
            $table->bigInteger('image_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('asset');
            $table->foreign('image_id')->references('id')->on('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_image');
    }
}
