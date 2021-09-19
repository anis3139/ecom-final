<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Page::truncate();
        Schema::enableForeignKeyConstraints();
        // Page::factory()->count(2)->create();
        $faker = Faker::create();
        $title = 'Privacy policy';

        $setting = new Page();
        $setting->title = $title;
        $setting->slug = Str::slug($title);
        $setting->description =$faker->sentence(500) ;
        $setting->save();

        $title2 = 'Terms And Conditions';
        $setting = new Page();
        $setting->title = $title2;
        $setting->slug = Str::slug($title2);
        $setting->description =$faker->sentence(500);
        $setting->save();
    }
}
