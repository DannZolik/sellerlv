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
            'value' => 'Job and business',
            'image' => 'bi bi-briefcase',
            'route' => 'business'
        ]);
        AdvertCategory::create([
            'value' => 'Transport',
            'image' => 'bi bi-truck',
            'route' => 'transport'
        ]);
        AdvertCategory::create([
            'value' => 'Real estate',
            'image' => 'bi bi-house-door',
            'route' => 'realestate'
        ]);
        AdvertCategory::create([
            'value' => 'Construction',
            'image' => 'bi bi-hammer',
            'route' => 'construction'
        ]);
        AdvertCategory::create([
            'value' => 'Electronics',
            'image' => 'bi bi-tv',
            'route' => 'electronics'
        ]);
        AdvertCategory::create([
            'value' => 'Clothes, footwear',
            'image' => 'bi bi-handbag',
            'route' => 'clothes'
        ]);
        AdvertCategory::create([
            'value' => 'For home',
            'image' => 'bi bi-lamp',
            'route' => 'forhome'
        ]);
        AdvertCategory::create([
            'value' => 'Production, work',
            'image' => 'bi bi-tools',
            'route' => 'production'
        ]);
        AdvertCategory::create([
            'value' => 'For children',
            'image' => 'bi bi-balloon',
            'route' => 'children'
        ]);
        AdvertCategory::create([
            'value' => 'Animals',
            'image' => 'bi bi-bug',
            'route' => 'animals'
        ]);
        AdvertCategory::create([
            'value' => 'Agriculture',
            'image' => 'bi bi-tree',
            'route' => 'agriculture'
        ]);
        AdvertCategory::create([
            'value' => 'Rest, hobbies',
            'image' => 'bi bi-music-note-beamed',
            'route' => 'hobbies'
        ]);
        //
    }
}
