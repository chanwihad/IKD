<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifikator extends Migration
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
            'verifikator' => ['verify indikator']
          ];
          $permissions = [
              'verify indikator'
          ];
  
          foreach ($permissions as $permission) {
              \Spatie\Permission\Models\Permission::create(['name' => $permission]);
          }
  
          $verifikator = \Spatie\Permission\Models\Role::findByName('verifikator');
          $verifikator->givePermissionTo($permissionByRole['verifikator']);
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
