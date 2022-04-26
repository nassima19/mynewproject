<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenificieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benificieres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nom',100);  
            $table->string('curriel')->unique();;
            $table->string('genre',50);
            $table->string('langue',100)->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('ville',100);
            $table->string('pays',100);
            $table->integer('number_employe');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('benificieres');
    }
}
