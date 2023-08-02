<?php

namespace Database\Seeders;

use App\Models\Admin;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->count(10)->create();
        // Admin::create([
        //     'name' => 'Othman Saleem',
        //     'email' => 'O@njjar.ps',
        //     'password' => Hash::make('password'),
        //     'super_admin' => '1',
        //     'status' => 'active',
        // ]);
    }
}
