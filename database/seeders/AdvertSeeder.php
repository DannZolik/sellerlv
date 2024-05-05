<?php

namespace Database\Seeders;

use App\Models\Advert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Advert::create([
            'title' => 'chair',
            'price' => 32.3,
            'description' => 'real chair',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 228,
            'userID' => 1,
            'categoryID' => 1,
        ]);
    }
}
