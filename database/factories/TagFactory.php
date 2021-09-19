<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $blog=Blog::all()->pluck('id');
        return [
            'name' => $this->faker->firstNameMale,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(1200, 600, true),
            'blog_id' => $this->faker->randomElement($blog),
        ];
    }
}
