<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alm_alumno', function (Blueprint $table) {
            $table->increments("alm_id");
            $table->string("alm_codigo", 100)->unique();
            $table->string("alm_nombre", 300);
            $table->integer("alm_edad");
            $table->string("alm_sexo", 100);
            $table->unsignedInteger('alm_id_grd'); 
            $table->foreign("alm_id_grd")->references('grd_id')->on('grd_grado')->onDelete("cascade")->onUpdate("cascade");
            $table->string("alm_observacion", 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alm_alumno');
    }
}
