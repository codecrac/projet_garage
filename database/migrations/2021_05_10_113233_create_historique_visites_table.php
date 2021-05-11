<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueVisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_visites', function (Blueprint $table) {
            $table->id();
            $table->integer("id_vehicule");

            $table->string("date");
            $table->string("date_prochaine_visite")->nullable();
            $table->string("motif");
            $table->enum("etat",["Non Debuter","En cours","Terminer"]);
            $table->json("etat_des_lieux")->nullable();
            $table->json("travaux")->nullable();
            $table->json("factures")->nullable();
            $table->string("total_travaux")->nullable();
            $table->string("main_doeuvre")->nullable();
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
        Schema::dropIfExists('historique_visites');
    }
}
