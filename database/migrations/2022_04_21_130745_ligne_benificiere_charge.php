<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LigneBenificiereCharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benificiere_charge', function (Blueprint $table) {

        $table->bigInteger('benificiere_id')->unsigned();
        $table->foreign('benificiere_id')->references('id')->on ('benificieres')->onDelete('cascade');
        $table->bigInteger('charge_id')->unsigned();
        $table->foreign('charge_id')->references('id')->on('charges')->onDelete('cascade');
        $table->primary(['benificiere_id','charge_id']);

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
