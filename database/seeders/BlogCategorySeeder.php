<?php

namespace Database\Seeders;


use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        BlogCategory::truncate();
        Schema::enableForeignKeyConstraints();
        BlogCategory::factory()->count(1)->create();
    }
}
