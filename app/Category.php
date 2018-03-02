<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // jei viska gerai uzvadinom (model - vnskaita, o table - daugiskaita) - nieko nereikia rasyt
		// kitaip reikes prirasyti:
		// protected $table = 'categories'; // SQL table name
		public function products() {
			return Product::where('category', $this->id)->count();
		}
}
