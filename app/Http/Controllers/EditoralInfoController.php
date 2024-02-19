<?php

namespace App\Http\Controllers;

use App\Models\Editoral;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EditoralInfoController extends Controller
{
    private $editorals;
    private $editoral;
    public function index()
    {
        return view('admin.editoralinfo.index');
    }
    public function create(Request $request)
    {
        Editoral::newEditoral($request);
        Alert::Success('Editoral Add Successfully','');
        return redirect()->back();
    }
    public function manage()
    {
        $this->editorals=Editoral::orderBy('id','desc')->get();
        return view('admin.editoralinfo.manage',['editorals'=>$this->editorals]);
    }
    public function edit($id)
    {
        $this->editoral=Editoral::find($id);
        return view('admin.editoralinfo.edit',['editoral'=>$this->editoral]);
    }
    public function update(Request $request,$id)
    {
        Editoral::updateEditoral($request,$id);
        Alert::Success('Editoral update Successfully','');
        return redirect()->route('editoralinfo.manage');
    }
    public function delete($id)
    {
        $this->editoral=Editoral::find($id);
        if (file_exists($this->editoral->iamge))
        {
            unlink($this->editoral->iamge);
        }
        $this->editoral->delete();
        Alert::Success('Editoral Delete Successfully','');
        return redirect()->route('editoralinfo.manage');
    }
}
