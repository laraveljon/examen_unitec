<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivelColegiaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivel_colegiaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_colegiatura');
            $table->bigInteger('interes_id'); //dependencias tabla de nivel_interes
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
        Schema::dropIfExists('nivel_colegiaturas');
    }
}
