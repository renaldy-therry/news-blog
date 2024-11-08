<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();

        $admin->image = '/test';
        $admin->name = 'Super User';
        $admin->email = 'admin@mail.com';
        $admin->password = 'admin';
        $admin->status = 1;
        $admin->save();
    }
}
