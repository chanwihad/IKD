<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProducenData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $permissionByRole = [
          'produsen_data' => ['manage indikator']
        ];

        $produsen_data = \Spatie\Permission\Models\Role::findByName('produsen_data');
        $produsen_data->givePermissionTo($permissionByRole['produsen_data']);
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
