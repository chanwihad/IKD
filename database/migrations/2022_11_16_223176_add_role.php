<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \Spatie\Permission\Models\Role::create(['name' => 'verifikator']);
        \Spatie\Permission\Models\Role::create(['name' => 'validator']);
        \Spatie\Permission\Models\Role::create(['name' => 'produsen_data']);
        \Spatie\Permission\Models\Role::create(['name' => 'admin']);
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
