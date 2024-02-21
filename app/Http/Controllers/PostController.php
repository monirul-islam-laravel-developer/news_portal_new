<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reporter;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\RoleRoute;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    private $categories;
    private $subcategories;
    private $categoryId;
    private $reporters;
    private $posts;
    private $post;
    public function index()
    {
        $this->categories=Category::all();
        $this->subcategories=SubCategory::all();
        $this->reporters=Reporter::all();
        return view('admin.post.index',
        [
            'categories'=>$this->categories,
            'subcategories'=>$this->subcategories,
            'reporters'=>$this->reporters
        ]
        );
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'reporter_id'=>'required',
            'title'=>'required',
        ]);
        Post::newpost($request);
        Alert::Success('Post Create Successfully','');
        return redirect()->back();
    }

    public function manage()
    {
        $this->posts=Post::orderBy('id','desc')->get();
        return view('admin.post.manage',[
            'posts'=> $this->posts]);

    }

    public function edit($id)
    {
        $this->categories=Category::all();
        $this->subcategories=SubCategory::all();
        $this->reporters=Reporter::all();
        $this->post=Post::find($id);
        return view('admin.post.edit',['post'=> $this->post,
            'categories'=>$this->categories,
            'subcategories'=>$this->subcategories,
            'reporters'=>$this->reporters]);
    }

    public function update(Request $request, $id)
    {
        Post::updatePost($request,$id);
        Alert::Success('Post Update Successfully','');
        return redirect()->route('post.manage');

    }

    public function delete($id)
    {
        $this->post=Post::find($id);
        if (file_exists($this->post->image))
        {
            unlink($this->post->image);
        }
        $this->post->delete();
        Alert::Success('Post Delete Successfully','');
        return redirect()->route('post.manage');
    }
    public function getSubCategory()
    {
        $this->categoryId = $_GET['id'];
        $this->subcategories= SubCategory::where('category_id',$this->categoryId)->get();
        return response()->json($this->subcategories);
    }
}
