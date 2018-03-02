<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;
use App\Category;

class ProductController extends Controller
{
	public function show(Request $request) {
		// dd($request->id); // isitikinti ar tikrai ateina ID (arba tai, kas irasyta Routuose web.php)
		// SELECT * FROM products where id = $id  - tarkim toki darysim sql, bet su eloquant
		$product = Product::findOrFail($request->id); // veiks su id
		// dd($product);
		return view('product/show', ['product' => $product]);
		// echo 'show';
	}

	public function create() {
		// $products = Product::all();
		// return view('product/create', ['products' => $products]);
		$manufacturers = Manufacturer::all();
		$categories = Category::all();
		return view('product/create', ['manufacturers' => $manufacturers, 'categories' => $categories]);

	}

	private function validation(Request $request) {
		$request->validate([
			'title' 				=> 'required|max:300',
			'quantity' 			=> 'required|integer|min:1|digits_between:0,8',
			'price' 				=> 'required|numeric|min:0|max:100',
			'description' 	=> 'required|max:1000',
			'category'			=> 'nullable|numeric',
			'manufacturer' 	=> 'required|numeric'
		], [
			// perrasys visas Required taisykles:
			'required'				=> 'Laukelis :attribute privalomas!',
			// perrasys tik title inputo taisykle:
			'title.required' 	=> 'Antrastes laukelis yra privalomas'
		]);
		// return $request; nereikia, veikia ir be
	}

	public function store(Request $request) {
		// dd($request);
		$this->validation($request);
		// cia sitoj vietoj sustoja, jeigu validacijos nepraeina
		$product = new Product();
		$product->title = $request->title;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->description = $request->description;
		$product->category = $request->category;
		$product->manufacturer = $request->manufacturer;
		$product->save();
		// po save duoda id jau, pries jeigu panbytumem pasiimti - jo nebutu dar
		// dd($product->id);
		return redirect()->route('products.show', $product->id);
	}

	public function edit(Request $request) {
		// echo 'edit';
		$product = Product::find($request->id);
		// dd($product);
		$manufacturers = Manufacturer::all();
		$categories = Category::all();
		return view('product/edit', [
			'manufacturers' => $manufacturers,
			'categories' 		=> $categories,
			'product'				=> $product
		]);
	}

	public function update(Request $request) {
		// echo 'update';
		$this->validation($request);
		$product = Product::find($request->id);
		$product->title = $request->title;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->description = $request->description;
		$product->category = $request->category;
		$product->manufacturer = $request->manufacturer;
		$product->save();
		return redirect()->route('products.show', $product->id);
	}

	public function destroy(Request $request) {
		// echo 'destroy';
		$product = Product::find($request->id);
		$product->delete();
		return redirect()->route('home');
	}

}
