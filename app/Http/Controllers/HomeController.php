<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); // jeigu uzkomentuoji nereikalaus prisiloginimo
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // galima sukurti daugiau metodu, ir nukreipti i juos
    {
			$products = Product::all();
			$categories = Category::all();
      return view('home', [
				'products' 		=> $products,
				'categories' 	=> $categories
			]);
    }
}
