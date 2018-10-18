<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreProfileFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('about', 1000);
            $table->string('hobbies');
            $table->string('city');
            $table->string('country');
            $table->string('google_plus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('about');
            $table->dropColumn('hobbies');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('google_plus');
        });
    }
}
