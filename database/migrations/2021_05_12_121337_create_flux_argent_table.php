<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFluxArgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flux_argent', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->string("date_hebdo");
            $table->string("montant");
            $table->string("motif");
            $table->enum("flux",["entree","sortie"]);
            $table->string("id_vehicule_concerner")->nullable();
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
        Schema::dropIfExists('flux_argent');
    }
}
