<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartyList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('users', function($table){
            $table->integer('partySize')->default(0);
            $table->string('guest1')->default('');
            $table->string('guest2')->default('');
            $table->string('guest3')->default('');
            $table->string('guest4')->default('');
            $table->string('guest5')->default('');
        });
    }

    /**Reverse the migrations.
     * @return void*/
    public function down(){
        Schema::table('users', function($table){
            $table->dropColumn('partySize');
            $table->dropColumn('guest1');
            $table->dropColumn('guest2');
            $table->dropColumn('guest3');
            $table->dropColumn('guest4');
            $table->dropColumn('guest5');
        });
    }
}
