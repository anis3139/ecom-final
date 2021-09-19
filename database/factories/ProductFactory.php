<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $category=Category::all()->pluck('id');
        $brand=Brand::all()->pluck('id');
        $attribute=Attribute::all()->pluck('id');
        $admin=Admin::all()->pluck('id');

        return [
            'name' => $this->faker->firstNameMale,
            'product_id' => $this->faker->numberBetween( 4444, 5555 ),
            'stock' => $this->faker->numberBetween( 40, 200 ),
            'slug' => $this->faker->slug,
            'sku' => $this->faker->firstNameMale,
            'purchase_price' => $this->faker->numberBetween(800,900),
            'product_price' => $this->faker->numberBetween(1000,1200),
            'discount' => $this->faker->numberBetween(10,20),
            'product_selling_price' => $this->faker->numberBetween(1000,1200),
            'description' => $this->faker->text(200),
            'attribute' => $this->faker->name,
            'brand_id' => $this->faker->randomElement($brand),
            'category_id' => $this->faker->randomElement($category),
            'attribute_id' => $this->faker->randomElement($attribute),
            'created_by' => $this->faker->randomElement($admin),
        ];
    }
}
