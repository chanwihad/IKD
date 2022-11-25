<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidator extends Migration
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
            'validator' => ['validate indikator']
          ];
          $permissions = [
              'validate indikator'
          ];
  
          foreach ($permissions as $permission) {
              \Spatie\Permission\Models\Permission::create(['name' => $permission]);
          }
  
          $admin = \Spatie\Permission\Models\Role::findByName('validator');
          $admin->givePermissionTo($permissionByRole['validator']);
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
