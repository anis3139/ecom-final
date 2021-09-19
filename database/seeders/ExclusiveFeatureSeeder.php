<?php

namespace Database\Seeders;

use App\Models\ExclusiveFeature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExclusiveFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ExclusiveFeature::truncate();
        Schema::enableForeignKeyConstraints();
        ExclusiveFeature::factory()->count(3)->create();
    }
}
