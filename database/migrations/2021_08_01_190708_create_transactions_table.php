<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transactions', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('payee_id');
          $table->unsignedBigInteger('payer_id');
          $table->integer('value');
          $table->timestamps();

          //foreign key (constraints)
          $table->foreign('payee_id')->references('id')->on('users')->unique();
          $table->foreign('payer_id')->references('id')->on('users')->unique();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
