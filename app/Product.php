<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// public $store= 'ebay'; - savybes pridejimas prie modelio (laisvai nuo DB, rankiniu budu pvz)
	public function categories() {
		// sukuria sasaja su Category modeliu:
		return $this->hasOne('App\Category', 'id', 'category');
	}
	public function manufacturers() {
		// sukuria sasaja su Manufacturer modeliu:
		return $this->hasOne('App\Manufacturer', 'id', 'manufacturer');
	}

}
