<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom', 100);
            $table->string('nomfamille', 100);
            $table->string('courriel', 256)->unique();
            $table->string('nom_usager', 100)->unique();
            $table->string('mot_de_passe', 200);
            $table->string('url_image', 300)->nullable();
            $table->boolean('administrateur')->default(0);
            $table->boolean('souvenir_de_moi')->default(0);
            $table->rememberToken();
            $table->timestamps();

            //foreign keys

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
