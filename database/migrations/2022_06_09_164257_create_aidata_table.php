<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAidataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aidata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scheme');
            $table->string('a_color')->default(null);
            $table->string('b_color')->default(null);
            $table->string('c_color')->default(null);
            $table->string('d_color')->default(null);
            $table->string('e_color')->default(null);
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
        Schema::dropIfExists('aidata');
    }
}
