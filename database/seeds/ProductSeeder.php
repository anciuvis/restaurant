<?php

use Illuminate\Database\Seeder;
use App\Product; // ideda modeli kaip klase


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = Faker\Factory::create('lt_LT'); // create('lt_LT') - duoda lokalizacija

		foreach (range(1, 10) as $key) {
			$product = new Product;
			$product->title = $faker->firstName;
			$product->description = $faker->text;
			$product->price = $faker->randomFloat(2, 5, 95);
			$product->quantity = $faker->randomFloat(0, 1, 10);
			$product->category = rand(1, 10);
			$product->manufacturer = rand(1, 10);
			$product->save();
		}
    }
}
