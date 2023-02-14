<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSessionCodeToSessionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_sessions', function(Blueprint $table) {
            $table->renameColumn('session_code', 'session_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stnk', function(Blueprint $table) {
            $table->renameColumn('session_id', 'session_code');
        });
    }
}
