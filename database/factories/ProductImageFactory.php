<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product=Product::all()->pluck('id');
        return [
            'product_id' => $this->faker->randomElement($product),
            'image_path' => $this->faker->imageUrl(400,400, true ),
        ];
    }
}
