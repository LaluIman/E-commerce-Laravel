<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
                [
                    'name' => 'startup',
                    'icon' => null
                ],
                [
                    'name' => 'wwdc',
                    'icon' => null
                ],
                [
                    'name' => 'awards',
                    'icon' => null
                ],
                [
                    'name' => 'game',
                    'icon' => null
                ],
                [
                    'name' => 'learning',
                    'icon' => null
                ],
                [
                    'name' => 'business',
                    'icon' => null
                ],
                [
                    'name' => 'sport',
                    'icon' => null
                ],
            ];
            //insert data to table catogories
            foreach ($categories as $category) {
               Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
               ]);
            }
    }
}
