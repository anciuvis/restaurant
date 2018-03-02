<?php

use Illuminate\Database\Seeder;
use App\Category; // ideda modeli kaip klase

// use Faker\Factory as Faker;
// $faker = Faker::create();


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = Faker\Factory::create();

			foreach (range(1, 10) as $key) {
				$category = new Category;
				$category->title = $faker->colorName;
				$category->save();
			}
		}
}
