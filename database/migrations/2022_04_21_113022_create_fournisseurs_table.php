<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('categorie_id')->unsigned();
            $table->string('nom',100); 
            $table->string('domaine_activite'); 
            $table->string('genre',50);
            $table->string('adresse');
            $table->string('titre',50);
            $table->string('ville',100);
            $table->string('pays',100);
            $table->integer('code_postal');
            $table->string('curriel')->unique();;
            $table->string('telephone')->nullable();
            $table->string('site_internet')->nullable();
            $table->string('note')->nulable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('fournisseurs');
    }
}
