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
            $table->string('invoice_number', 30);
            $table->decimal('total_qty');
            $table->decimal('total_amount');
            $table->string('status',50)->default('WAITING');
            $table->string('name', 50);
            $table->string('email', 50);
            $table->string('phone',15);
            $table->text('address');
            $table->bigInteger('session_id')->unsigned()->index()->nullable();
            $table->foreign('session_id')->references('id')->on('shopping_sessions')->onDelete('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
