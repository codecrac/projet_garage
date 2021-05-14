<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilanComptableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilan_comptable', function (Blueprint $table) {
            $table->id();
            $table->string('mois_reference')->unique();
            $table->string('mois_a_afficher')->unique();
            $table->string('total_depense');
            $table->string('total_entree');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bilan_comptable');
    }
}
