<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
Use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    private $blogs;
    private $blog;
    public function index()
    {
        return view('admin.blog.add');
    }
    public function create(Request $request)
    {
        Blog::newBlog($request);
        Alert::Success('Blog Create Successfully','');
        return redirect()->back();
    }
    public function manage()
    {
        $this->blogs=Blog::orderBy('id','desc')->get();
        return view('admin.blog.manage',['blogs'=>$this->blogs]);
    }
    public function edit($id)
    {
        $this->blog=Blog::find($id);
        return view('admin.blog.edit',['blog'=>$this->blog]);
    }
    public function update(Request $request,$id)
    {
        Blog::updateBlog($request,$id);
        Alert::Success('Blog Update Successfully','');
        return redirect()->route('blog.manage');
    }
    public function delete($id)
    {
        $this->blog=Blog::find($id);
        if (file_exists($this->blog->image))
        {
            unlink($this->blog->image);
        }
        $this->blog->delete();
        Alert::Success('Blog Delete Successfully','');
        return redirect()->route('blog.manage');
    }
}
