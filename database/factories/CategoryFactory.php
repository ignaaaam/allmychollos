<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
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
    }
}
