<?php

namespace Database\Seeders;

use App\Models\UserData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserData::create([
            'value' => 'test@test.com',
            'isPrivate' => false,
            'userID' => 1,
            'userDataTypeID' => 1,
        ]);

        UserData::create([
            'value' => '8 800 555 35 35',
            'isPrivate' => false,
            'userID' => 1,
            'userDataTypeID' => 2,
        ]);
        UserData::create([
            'value' => 'dannzolik.tplinkdns.com',
            'isPrivate' => false,
            'userID' => 1,
            'userDataTypeID' => 3,
        ]);
    }
}
