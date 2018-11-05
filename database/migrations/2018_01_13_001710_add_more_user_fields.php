<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreUserFields extends Migration
{
    /**Run the migrations.
     * @return void*/
    public function up(){
        Schema::table('users', function($table){
            $table->integer('attending')->default(0);
            $table->integer('plusOne')->default(0);
        });
    }

    /**Reverse the migrations.
     * @return void*/
    public function down(){
        Schema::table('users', function($table){
            $table->dropColumn('attending');
            $table->dropColumn('plusOne');
        });
    }
}
