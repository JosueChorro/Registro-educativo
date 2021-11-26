<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaxGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxg_materiasxgrado', function (Blueprint $table) {
            $table->increments('mxg_id');
            $table->unsignedInteger('mxg_id_grd'); 
            $table->foreign("mxg_id_grd")->references('grd_id')->on('grd_grado')->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedInteger('mxg_id_mat'); 
            $table->foreign("mxg_id_mat")->references('mat_id')->on('mat_materia')->onDelete("cascade")->onUpdate("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mxg_materiasxgrado');
    }
}
