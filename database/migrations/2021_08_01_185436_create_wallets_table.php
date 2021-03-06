<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('wallets', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->decimal('balance', 6, 2, true);
          $table->timestamps();

          //foreign key (constraints)
          $table->foreign('user_id')->references('id')->on('users');
          $table->unique('user_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
