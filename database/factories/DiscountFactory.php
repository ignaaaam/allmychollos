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
        $originalPrice = $this->faker->randomFloat('2', 0, 2);
        $discountMin = $originalPrice / 2;
        $discountMax = $originalPrice - 5;
        $discountedPrice = $this->faker->numberBetween($discountMin, $discountMax);
        $percentage = 100 * ($originalPrice - $discountedPrice) / $originalPrice;

        return [
            'user_id' =>User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'link' => $this->faker->url(),
            'original_price' => $originalPrice,
            'discounted_price' => $discountedPrice,
            'percentage' => round($percentage)
        ];
    }
}
