<?php

namespace Database\Seeders;

use App\Models\AdvertCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdvertCategory::create([
            'value' => 'home'
        ]);
        //
    }
}
