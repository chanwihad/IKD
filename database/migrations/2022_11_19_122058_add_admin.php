<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
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
            'admin' => ['administrator']
          ];
          $permissions = [
              'administrator'
          ];
  
          foreach ($permissions as $permission) {
              \Spatie\Permission\Models\Permission::create(['name' => $permission]);
          }
  
          $verifikator = \Spatie\Permission\Models\Role::findByName('admin');
          $verifikator->givePermissionTo($permissionByRole['admin']);
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
