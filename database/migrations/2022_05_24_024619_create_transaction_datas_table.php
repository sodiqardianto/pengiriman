<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignid('transaction_id')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('muatan',[100,50,25]);
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
        Schema::dropIfExists('transaction_datas');
    }
}
