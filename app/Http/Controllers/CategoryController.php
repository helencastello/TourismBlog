<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryPage() {
        $categories = Category::all();
        return view('category')->with('categories', $categories);
    }

    public function addCategoryPage() {
        return view('add-category');
    }

    public function addCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.page');
    }
}
