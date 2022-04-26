<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('fournisseur_id')->unsigned();
            $table->string('nom');
            $table->string('description')->nullable();
            $table->string('methode_paiement');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
