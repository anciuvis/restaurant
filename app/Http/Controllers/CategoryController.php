<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
		public function __construct() {
			// uzdeda middleware grupe ant visu kontrolerio routu, isskyrus paminetus excepte
			$this->middleware('auth')->except('index', 'show');
			// atvirkstinis variantas su only:
			// $this->middleware('auth')->only('index', 'show');
		}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			// $categories = Category::all();
			// padarom kietesni su rikiavimu pagal ID ASC
			$categories = Category::orderBy('id','asc')->get();
      return view('category/index', [
				'categories' => $categories,
		]);
    }

		private function validation(Request $request) {
			$request->validate([
				'title' 		=> 'required|max:300',
			], [
				'required'	=> 'Laukelis :attribute privalomas!',
			]);
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$this->validation($request);
			$category = new Category();
			$category->title = $request->title;
			$category->save();
			return redirect()->route('categories.index', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       return view('category/show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
			return view('category/edit', [
				'category' 		=> $category,
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
			$this->validation($request);
			$category->title = $request->title;
			$category->save();
			return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
		// nereikia daryti ::find (kaip dareme ProductControllere), nes per instantacija ateina jau ta reikiama kategorija pagal ID
    {
        $category->delete();
				return redirect()->route('categories.index');
    }
}
