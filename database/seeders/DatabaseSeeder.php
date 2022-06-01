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
            'email' => 'admin@example.com',
            'role_id' => 1
        ]);

        $categories = [
            [
                'name' => 'Electrónica',
                'slug' => 'electronica'
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming'
            ],
            [
                'name' => 'Supermercado y alimentacion',
                'slug' => 'supermercado-y-alimentacion'
            ],
            [
                'name' => 'Moda y accesorios',
                'slug' => 'moda-y-accesorios'
            ],
            [
                'name' => 'Salud y belleza',
                'slug' => 'salud-y-belleza'
            ],
            [
                'name' => 'Juguetes y familia',
                'slug' => 'juguetes-y-familia'
            ],
            [
                'name' => 'Hogar, vivienda y oficina',
                'slug' => 'hogar-vivienda-y-oficna'
            ],
            [
                'name' => 'Jardín y bricolaje',
                'slug' => 'jardin-y-bricolaje'
            ],
            [
                'name' => 'Deportes y aire libre',
                'slug' => 'deportes-y-aire-libre'
            ],
            [
                'name' => 'Software',
                'slug' => 'software'
            ]
        ];

        foreach ($categories as $category) {
            $category = Category::create($category);

            Discount::factory()->create([
                'user_id' => $user->id,
                'premium' => false,
                'category_id' => $category->id,
            ]);
        }
    }
}
