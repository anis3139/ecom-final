<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        // User::factory()->count(20)->create();
        $user = new User();
        $user->name = 'Test User';
        $user->email = 'user@gmail.com';
        $user->phone_number = '0116366535';
        $user->email_verified_at =  now();
        $user->image = 'https://cdn.pixabay.com/photo/2014/02/27/16/10/tree-276014_960_720.jpg';
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';// password
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
