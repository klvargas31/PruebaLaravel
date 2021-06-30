<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name'=> 'Admin']);
       $role2 = Role::create(['name'=> 'Seller']);

       Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
       Permission::create(['name' => 'users.store'])->syncRoles([$role1]);
       Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
       Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

       Permission::create(['name' => 'clients.index'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'clients.store'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'clients.update'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'clients.destroy'])->syncRoles([$role1, $role2]);
    }
}
