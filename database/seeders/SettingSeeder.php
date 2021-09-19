<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Setting::truncate();
        Schema::enableForeignKeyConstraints();
        $setting = new Setting();
        $setting->logo = 'https://image.freepik.com/free-vector/abstract-logo-flame-shape_1043-44.jpg';
        $setting->hero_banner = 'https://cdn.pixabay.com/photo/2015/09/09/16/05/forest-931706__340.jpg';
        $setting->promo_image_one = 'https://cdn.pixabay.com/photo/2018/04/04/13/38/nature-3289812_960_720.jpg';
        $setting->promo_image_two = 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg';
        $setting->promo_image_three = 'https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014_960_720.jpg';
        $setting->site_name = 'Ecommerce';
        $setting->video_link = 'https://player.vimeo.com/video/87701971';
        $setting->title = 'Welcome To Our Ecommerce';
        $setting->phone = '01816366535';
        $setting->email = 'anis904692@gmail.com';
        $setting->sub_title = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, facilis!';
        $setting->address = 'House # 20, Road # 07, Sector # 12, Uttara, Dhaka';
        $setting->gmap = 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14594.122610277705!2d90.382323!3d23.8707947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbef6c11c0c7b876b!2sgiftaecologist!5e0!3m2!1sen!2sbd!4v1624718324417!5m2!1sen!2sbd';
        $setting->save();
    }
}
