<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeColumnOnShoppingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_sessions', function (Blueprint $table) {
            //
            $table->string('name', 60)->nullable()->change();
            $table->string('email', 50)->nullable()->change();
            $table->string('phone',15)->nullable()->change();
            $table->longText('address')->nullable()->change();
            $table->text('session_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping_sessions', function (Blueprint $table) {
            //
        });
    }
}
