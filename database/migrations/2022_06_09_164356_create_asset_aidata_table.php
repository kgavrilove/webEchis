<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAidataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_aidata', function (Blueprint $table) {
            $table->primary(['asset_id','aidata_id']);
            $table->bigInteger('asset_id')->unsigned();
            $table->bigInteger('aidata_id')->unsigned();
            $table->foreign('asset_id')->references('id')->on('asset');
            $table->foreign('aidata_id')->references('id')->on('aidata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_aidata');
    }
}
