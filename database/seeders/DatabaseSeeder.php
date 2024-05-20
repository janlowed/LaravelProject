<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'John Loyd',
            'last_name' => 'Zamora',
            'email' => 'jl.zamora@gmail.com',
            'address' =>'Barangay Liberty Hilongos, Leyte',
            'dob' => 'June 23, 2003',
            'age' => '20',
            'gender' => 'Male',
            'password' => Hash::make('123454321')
        ]);
    }
}
