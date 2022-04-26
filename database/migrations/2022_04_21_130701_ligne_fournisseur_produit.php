<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LigneFournisseurProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseur_produit', function (Blueprint $table) {

        $table->primary(['fournisseur_id','produit_id']);
        $table->bigInteger('fournisseur_id')->unsigned();
        $table->bigInteger('produit_id')->unsigned();
        $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
        $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
