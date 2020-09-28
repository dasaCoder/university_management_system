<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('roles')->insert([['name'=>'admin','guard_name'=>'web']]);
        \DB::table('roles')->insert([['name'=>'lecturer','guard_name'=>'web']]);
        \DB::table('roles')->insert([['name'=>'student','guard_name'=>'web']]);
        \DB::table('roles')->insert([['name'=>'financer','guard_name'=>'web']]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
