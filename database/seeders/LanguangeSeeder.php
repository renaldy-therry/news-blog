<?php

namespace Database\Seeders;

use App\Models\Languange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languange = new Languange();
        $languange->name = 'English';
        $languange->lang = 'en';
        $languange->slug = 'en';
        $languange->default = 1;
        $languange->status = 1;
        $languange->save();
    }
}
