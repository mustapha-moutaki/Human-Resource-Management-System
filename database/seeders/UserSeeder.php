<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = User::create([
        //     'first_name' =>'mustpha',
        //     'last_name' =>'moutaki',
        //     'email' =>'mustaphamoutaki@gmail.com',
        //     'password' =>'12345'
        // ]);
        // $admin->assignRole('Admin');
        $admin = User::create([
            'first_name' =>'mustapha',
            'last_name' =>'moutaki',
            'email' =>'mustaphagmail.com',
            'password' =>'123456789'
        ]);
        $admin->assignRole('Admin');
    }
}
