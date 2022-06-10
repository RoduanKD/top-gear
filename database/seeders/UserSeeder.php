<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'entry']);

        User::create(['name' => 'Admin', 'email' => 'admin@topgear.test'])
            ->assignRole('admin');
        User::create(['name' => 'Entry', 'email' => 'entry@topgear.test'])
            ->assignRole('entry');
    }
}
