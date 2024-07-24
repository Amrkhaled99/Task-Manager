<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Create 10000 users using the User factory
        User::factory(10)->create();  // Generate

        // Create 100 admin users using the User factory
        User::factory(1)->create(['is_admin' => true]);
    }
}
