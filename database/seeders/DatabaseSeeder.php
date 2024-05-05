<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserTypesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdvertCategorySeeder::class);
        $this->call(UserDataTypeSeeder::class);
        $this->call(UserDataSeeder::class);
        $this->call(AdvertSeeder::class);
        $this->call(PaidAdvertSeeder::class);
    }
}
