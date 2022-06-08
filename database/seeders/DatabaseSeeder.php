<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => "Administrateur",
            'email' => "admin@admin.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            "admin"=>1,
            "status"=>1
        ]);
        \App\Models\User::create([
            'name' => "Safa",
            'email' => "safa@user.com",
            "cin"=>12345678,
            "age"=>18,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            "admin"=>0,
            "status"=>1
        ]);

        for ($i=0;$i<25;$i++){
            \App\Models\User::create([
                'name' => "user".$i."",
                'email' => "user".$i."@user.com",
                "cin"=>rand(10000000,9999999),
                "age"=>rand(5,70),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                "admin"=>0,
                "status"=>1
            ]);
        }

    }
}
