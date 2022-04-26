<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produit_id')->unsigned();
            $table->bigInteger('fournisseur_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('piece_id')->unsigned();
            $table->bigInteger('qte')->unsigned();
            $table->integer('taxes');
            $table->date('date');
            $table->string('statu',50);
            $table->string('description',1000)->nullable();
            $table->string('remarque')->nullable();
            $table->double('prix',10,2);
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->unique('produit_id','fournisseur_id');
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
        Schema::dropIfExists('charges');
    }
}
