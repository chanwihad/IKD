<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Opd;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opd = Opd::first();
        User::create([
            'id' => 1,
            'name' => 'admin',
            'opd_id' => $opd->id,
            'nip' => 111122223333444455,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => 'admin',
            'jabatan' => 'admin'
        ]);
        $admin = User::getUserById(1);
        $admin->assignRole('admin');
    }
}
