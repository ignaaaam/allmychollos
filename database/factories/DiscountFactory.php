<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'link' => $this->faker->url(),
            $original_price = 'original_price' => $this->faker->randomFloat('2',0,2),
            'discounted_price' => $this->faker->numberBetween($min=$original_price/2, $max=$original_price-5)
        ];
    }
}
