<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('comptabilite',['true','false']);
            $table->enum('supprimer',['true','false']);
            $table->enum('creer_utilisateurs',['true','false']);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin@gmail.com'),
                'comptabilite' => 'true',
                'supprimer' => 'true',
                'creer_utilisateurs' => 'true'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
