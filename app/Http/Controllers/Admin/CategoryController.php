<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->category_name = $validatedData['category_name'];
        $category->category_status = $validatedData['category_status'] == true ? '0': '1';
        // $category->category_status = $validatedData['category_status']== true ? 'Active': '';

        $category->save();

        return redirect('admin/category')->with('message', 'Category added successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);


        $category->category_name = $validatedData['category_name'];
        $category->category_status = $validatedData['category_status'] == true ? '1': '0';

        $category->update();

        return redirect('admin/category')->with('message', 'Category updated successfully');

    }
}
