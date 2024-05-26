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
        // Категория 1
        Advert::create([
            'title' => 'chair',
            'price' => 32.3,
            'description' => 'A real chair made from high-quality wood. Perfect for any dining room.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 228,
            'userID' => 1,
            'categoryID' => 1,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'armchair',
            'price' => 120.0,
            'description' => 'A comfortable armchair with plush cushioning.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 150,
            'userID' => 1,
            'categoryID' => 1,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'rocking chair',
            'price' => 85.0,
            'description' => 'A classic wooden rocking chair, perfect for relaxation.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 90,
            'userID' => 1,
            'categoryID' => 1,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'office chair',
            'price' => 200.0,
            'description' => 'Ergonomic office chair with adjustable height and lumbar support.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 75,
            'userID' => 1,
            'categoryID' => 1,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'bar stool',
            'price' => 50.0,
            'description' => 'A sleek bar stool with a comfortable seat and footrest.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 112,
            'userID' => 1,
            'categoryID' => 1,
            'image' => 'images/1716751766.jpg',
        ]);

        // Категория 2
        Advert::create([
            'title' => 'table',
            'price' => 150.0,
            'description' => 'A sturdy wooden table that can seat six people comfortably. Ideal for family dinners.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 154,
            'userID' => 1,
            'categoryID' => 2,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'dining table',
            'price' => 300.0,
            'description' => 'Large dining table made of oak, seats up to eight people.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 142,
            'userID' => 1,
            'categoryID' => 2,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'coffee table',
            'price' => 85.0,
            'description' => 'Modern coffee table with glass top and wooden legs.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 131,
            'userID' => 1,
            'categoryID' => 2,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'side table',
            'price' => 45.0,
            'description' => 'Small side table with a drawer, perfect for any living room.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 80,
            'userID' => 1,
            'categoryID' => 2,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'patio table',
            'price' => 70.0,
            'description' => 'Durable patio table, ideal for outdoor settings.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 59,
            'userID' => 1,
            'categoryID' => 2,
            'image' => 'images/1716751766.jpg',
        ]);

        // Категория 3
        Advert::create([
            'title' => 'lamp',
            'price' => 45.5,
            'description' => 'A stylish desk lamp that provides excellent lighting for reading or working.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 312,
            'userID' => 1,
            'categoryID' => 3,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'floor lamp',
            'price' => 90.0,
            'description' => 'Modern floor lamp with adjustable height and brightness settings.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 145,
            'userID' => 1,
            'categoryID' => 3,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'table lamp',
            'price' => 30.0,
            'description' => 'Compact table lamp, perfect for bedside tables or desks.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 98,
            'userID' => 1,
            'categoryID' => 3,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'ceiling lamp',
            'price' => 120.0,
            'description' => 'Elegant ceiling lamp with a modern design, suitable for any room.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 167,
            'userID' => 1,
            'categoryID' => 3,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'wall lamp',
            'price' => 55.0,
            'description' => 'Stylish wall lamp that adds a touch of elegance to any room.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 83,
            'userID' => 1,
            'categoryID' => 3,
            'image' => 'images/1716751766.jpg',
        ]);

        // Категория 4
        Advert::create([
            'title' => 'sofa',
            'price' => 300.0,
            'description' => 'A comfortable three-seater sofa with plush cushions. Perfect for any living room.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 89,
            'userID' => 1,
            'categoryID' => 4,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'sectional sofa',
            'price' => 450.0,
            'description' => 'Large sectional sofa with a modern design and ample seating space.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 210,
            'userID' => 1,
            'categoryID' => 4,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'loveseat',
            'price' => 200.0,
            'description' => 'Compact loveseat, ideal for small living rooms or cozy spaces.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 76,
            'userID' => 1,
            'categoryID' => 4,
            'image' => 'images/1716751766.jpg',
        ]);

        Advert::create([
            'title' => 'reclining sofa',
            'price' => 350.0,
            'description' => 'Reclining sofa with adjustable positions for maximum comfort.',
            'activeUntil' => null,
            'status' => 'O',
            'views' => 98,
            'userID' => 1,
            'categoryID' => 4,
            'image' => 'images/1716751766.jpg',
        ]);
    }

}
