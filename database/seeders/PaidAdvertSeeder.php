<?php

namespace Database\Seeders;

use App\Models\PaidAdvert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaidAdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PaidAdvert::create([
            'status' => 'O',
            'activeUntil' => null,
            'views' => 22,
            'advertID' => 1,
        ]);
    }
}
