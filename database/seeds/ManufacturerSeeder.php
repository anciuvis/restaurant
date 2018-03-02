<?php

use Illuminate\Database\Seeder;
use App\Manufacturer; // ideda modeli kaip klase

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = Faker\Factory::create(); // create('lt_LT') - duoda lokalizacija

			foreach (range(1, 10) as $key) {
				$manufacturer = new Manufacturer;
				$manufacturer->title = $faker->company;
				$manufacturer->website = $faker->url;
				$manufacturer->country = $faker->country;
				$manufacturer->save();
			}
    }
}
