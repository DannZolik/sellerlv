<?php

namespace Database\Seeders;

use App\Models\UserTypes;
use Cassandra\Type\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserTypes::create([
            'typeValue' => 'admin'
        ]);
        UserTypes::create([
            'typeValue' => 'user'
        ]);
    }
}
