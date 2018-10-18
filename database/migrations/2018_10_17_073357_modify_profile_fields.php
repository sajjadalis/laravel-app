<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProfileFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('first_name', 50)->change();
            $table->string('last_name', 50)->change();
            $table->string('gender')->unsigned()->nullable()->change();
            $table->string('occupation')->unsigned()->nullable()->change();
            $table->string('phone_number')->unsigned()->nullable()->change();
            $table->string('picture')->unsigned()->nullable()->change();
            $table->string('cover_image')->unsigned()->nullable()->change();
            $table->string('about', 1000)->unsigned()->nullable()->change();
            $table->string('city')->unsigned()->nullable()->change();
            $table->string('country')->unsigned()->nullable()->change();
            $table->string('google_plus')->unsigned()->nullable()->change();
            $table->string('twitter')->unsigned()->nullable()->change();
            $table->string('facebook')->unsigned()->nullable()->change();
            $table->string('linkedin')->unsigned()->nullable()->change();
            $table->dropColumn('hobbies');
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
