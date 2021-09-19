<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        AboutPage::truncate();
        Schema::enableForeignKeyConstraints();
        $about = new AboutPage();
        $about->title = 'About us';
        $about->description = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, accusamus?';
        $about->image1 = 'https://cdn.pixabay.com/photo/2018/04/04/13/38/nature-3289812_960_720.jpg';
        $about->image2 = 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg';
        $about->image3 = 'https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014_960_720.jpg';
        $about->save();
    }
}
