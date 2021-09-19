<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category=BlogCategory::all()->pluck('id');
        $admin=Admin::all()->pluck('id');
        return [
            'name' => $this->faker->firstNameMale,
            'title' => $this->faker->firstNameMale,
            'slug' => $this->faker->slug,
            'post' => $this->faker->text(200),
            'image' => $this->faker->imageUrl(1200, 600, true),
            'created_by' => $this->faker->randomElement($admin),
            'blog_category_id' => $this->faker->randomElement($category),
        ];
    }
}
