<?php

namespace Database\Seeders;

use App\Models\UserDataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserDataType::create([
            'value' => 'email'
        ]);
        UserDataType::create([
            'value' => 'phone'
        ]);
        UserDataType::create([
            'value' => 'web'
        ]);
    }
}
