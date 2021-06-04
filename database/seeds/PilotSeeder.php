<?php

use Illuminate\Database\Seeder;

use App\Pilot;
use App\Car;

class PilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pilot::class, 100) -> create()
                -> each(function($pilot){
                $cars = Car::inRandomOrder()
                        -> limit(10)
                        -> get();
                $pilot -> cars() -> attach($cars);
                $pilot -> save();
                });
    }
}
