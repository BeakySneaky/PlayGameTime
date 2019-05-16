<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientspourexamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientspourexamen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomfamille');
            $table->string('prenom');
            $table->integer('statut_id')->unsigned();
            $table->timestamps();

            $table->foreign('statut_id')->references('id')->on('statutspourexamen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientspourexamen');
    }
}
