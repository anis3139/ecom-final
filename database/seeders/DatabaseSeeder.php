<?php

namespace Database\Seeders;

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
        $this->call([  RolePermissionSeeder::class ]);
        $this->call([  UserSeeder::class ]);
        $this->call([  BrandSeeder::class]);
        $this->call([  CategorySeeder::class]);
        $this->call([  AttributeSeeder::class]);
        $this->call([  ProductSeeder::class]);
        $this->call([  ProductImageSeeder::class]);
        $this->call([  SettingSeeder::class]);
        $this->call([  SliderSeeder::class]);
        $this->call([  AboutPageSeeder::class]);
        $this->call([  TestimonialSeeder::class]);
        $this->call([  ExclusiveFeatureSeeder::class]);
        $this->call([  SpecialFeatureSeeder::class]);
        $this->call([  BlogCategorySeeder::class]);
        $this->call([  BlogSeeder::class]);
        $this->call([  TagSeeder::class]);
        $this->call([  PageSeeder::class]);
        $this->call([  ColorSeeder::class]);
    }
}
