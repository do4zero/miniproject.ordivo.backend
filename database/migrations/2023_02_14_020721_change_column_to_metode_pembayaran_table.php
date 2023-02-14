<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToMetodePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('metode_pembayaran', function (Blueprint $table) {
            //
            $table->integer('admin');
            $table->string('type_admin')->default('NOMINAL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('metode_pembayaran', function (Blueprint $table) {
            //
            $table->dropColumn('admin');
            $table->dropColumn('type_admin');
        });
    }
}
