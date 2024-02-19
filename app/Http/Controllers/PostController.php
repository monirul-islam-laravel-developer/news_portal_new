<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleRoute;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index');
    }

    public function create(Request $request)
    {
        return $request->all();
    }

    public function manage()
    {
        return view('admin.post.manage');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }
}
