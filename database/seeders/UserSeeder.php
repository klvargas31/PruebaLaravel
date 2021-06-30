<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt ('password')
        ])->assignRole('Admin');
        
        User::create([
            'name' => 'Seller',
            'email' => 'seller@seller.com',
            'password' => bcrypt ('password')
        ])->assignRole('Seller');
    }
}
