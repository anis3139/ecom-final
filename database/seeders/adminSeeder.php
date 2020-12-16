<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name'=>'anis',
            'username'=>'admin',
            'email'=>'anis904692@gmail.com',
            'password'=>md5('ANIs9434278')
        ]);
    }
}
