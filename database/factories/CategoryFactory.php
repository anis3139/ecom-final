<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameMale,
            'slug' => $this->faker->slug,
            'icon' => $this->faker->imageUrl(600, 400, true ) ,
            'banner_image' => $this->faker->imageUrl(1200, 600, true),
            'is_menu' => 1,
            'is_homepage' => 1,
        ];
    }
}
