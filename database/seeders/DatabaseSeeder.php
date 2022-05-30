<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::factory()->create([
            'name' => 'admin'
        ]);

        Role::factory()->create([
            'name' => 'user'
        ]);

        Role::factory()->create([
            'name' => 'subscriber'
        ]);

        $user = User::factory()->create([
            'name' => 'John Doe',
            'role_id' => 1
        ]);

        $discount = Discount::factory(25)->create([
            'user_id' => $user->id,
            'premium' => false
        ]);
    }
}
