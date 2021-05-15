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
            $table->integer("id_client");

            $table->string("date");
            $table->string("date_prochaine_visite")->nullable();
            $table->string("motif");
            $table->enum("etat",["Non Debuter","En cours","Terminer","rendu"]);

            $table->json("etat_des_lieux")->nullable();
            $table->string("kilometrage")->nullable();
            $table->string("niveau_carburant")->nullable();

            $table->json("travaux")->nullable();
            $table->json("factures")->nullable();
            $table->string("total_travaux")->nullable();
            $table->string("main_doeuvre")->nullable();

            $table->string("total_a_payer")->nullable();
            $table->json("versements")->nullable();
            $table->string("total_versements")->default('0');
            $table->string("reste_a_payer")->nullable();
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
