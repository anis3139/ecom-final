<?php

namespace Database\Seeders;

use App\Models\SpecialFeature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SpecialFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        SpecialFeature::truncate();
        Schema::enableForeignKeyConstraints();
        SpecialFeature::factory()->count(3)->create();
    }
}
