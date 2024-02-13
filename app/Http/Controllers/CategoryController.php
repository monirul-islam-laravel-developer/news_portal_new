<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => ['required', 'unique:categories', 'max:255'],
        ]);
       Category::newCategory($request);
        Alert::success('Category Added Successfully', '');
        return redirect()->back();
    }

    public function manage()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('admin.category.manage', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request,$id);
        Alert::success('Category update successfully', '');
        return redirect()->route('category.manage');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (file_exists($category->image))
        {
            unlink($category->image);
        }
        $category->delete();
        Alert::success('Category delete Successfully', '');
        return redirect()->back();
    }
}
