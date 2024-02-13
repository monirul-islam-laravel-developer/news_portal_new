<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    private $categories;
    private $subcategories;
    private $subcategory;
    public function index()
    {
        $this->categories=Category::all();
        return view('admin.subcategory.add',['categories'=>$this->categories]);
    }
    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        Alert::Success('Subcategory Create Successfully','');
        return redirect()->back();
    }
    public function manage()
    {
        $this->subcategories=SubCategory::orderBy('id','desc')->get();
        return view('admin.subcategory.manage',['subcategories'=>$this->subcategories]);
    }
    public function edit($id)
    {
        $this->categories=Category::all();
        $this->subcategory=SubCategory::find($id);
        return view('admin.subcategory.edit',[
            'categories'=>$this->categories,
            'subcategory'=>$this->subcategory]);
    }
    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request,$id);
        Alert::Success('Subcategory Update Successfully','');
        return redirect()->route('subcategory.manage');
    }
    public function delete($id)
    {
        $this->subcategory=SubCategory::find($id);
        if (file_exists($this->subcategory->image))
        {
            unlink($this->subcategory->image);
        }
        $this->subcategory->delete();
        Alert::Success('Subcategory Delete Successfully','');
        return redirect()->route('subcategory.manage');
    }


}
