<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add status column to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('active')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // remove status column from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
