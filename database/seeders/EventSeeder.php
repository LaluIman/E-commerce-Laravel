<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventCount = 20, int $ticketCount = 5): void{
        
            //if category empty run CategorySeeder
            if(Category::count()== 0){
                $this->call(CategorySeeder::class);
            }

            //insert data using faker php
            $faker = Factory::create();
            //membuat event berdasarkan eventCount
            for($i=0; $i < $eventCount; $i++){
            //create event
            $event = Event::create([
                'name'=> $faker->sentence(2),
                'slug'=> $faker->slug(2),
                'headline'=> $faker->sentence(7),
                'description'=> $faker->paragraph(1),
                'start_time'=> $faker->dateTimeBetween('+1month','+6month'),
                'locations'=> $faker->address,
                'durations'=> $faker->numberBetween(1,10),
                'category_id'=>Category::inRandomOrder()->first()->id,
                'type'=> $faker->randomElement(['online','offline']),
                'is_popular'=> $faker->boolean(20),
            ]);

            //membuat tiket berdasarkan ticketCount
            for($j=0; $j < $ticketCount; $j++){
                $event -> tickets()->create([
                    'name'=>$faker->sentence(2),
                    'price'=>$faker->numberBetween(10,100),
                    'quantity'=>$faker->numberBetween(10,100),
                    'max_buy'=>$faker->numberBetween(1,10),
                ]);
            }
        }
    }
}
