<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarteUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte_utilisateur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carte_id')->unsigned();
            $table->integer('utilisateur_id')->unsigned();

            //
            $table->foreign('carte_id')->references('id')->on('cartes');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
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
        Schema::dropIfExists('carte_utilisateur');
    }
}
