<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('occupation');
            $table->string('phone_number');
            $table->string('picture');
            $table->string('cover_image');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedin');
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
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('gender');
            $table->dropColumn('occupation');
            $table->dropColumn('phone_number');
            $table->dropColumn('picture');
            $table->dropColumn('cover_image');
            $table->dropColumn('twitter');
            $table->dropColumn('facebook');
            $table->dropColumn('linkedin');
        });
    }
}
