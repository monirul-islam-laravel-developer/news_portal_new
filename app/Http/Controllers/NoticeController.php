<?php

namespace App\Http\Controllers;

use App\Models\Noticee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class NoticeController extends Controller
{
    private $notice;
    private $notices;
    public function index()
    {
        return view('admin.notice.index');
    }
    public function create(Request $request)
    {
        $this->notice                      = new Noticee();
        $this->notice->title               =$request->title;
        $this->notice->slug                =Str::slug($request->title);
        $this->notice->link                =$request->link;
        if ($request->status==1)
        {
            $this->notice->status          =$request->status;
        }
        $this->notice->save();
        Alert::Success('Notice Create Successfully.','');
        return redirect()->back();
    }
    public function manage()
    {
        $this->notices=Noticee::orderBy('id','desc')->get();
        return view('admin.notice.manage',['notices'=> $this->notices]);
    }
    public function edit($id)
    {
        $this->notice                          =Noticee::find($id);
        return view('admin.notice.edit',['notice'=> $this->notice]);
    }
    public function update(Request $request,$id)
    {
        $this->notice                       =Noticee::find($id);
        $this->notice->title                =$request->title;
        $this->notice->slug                 =Str::slug($request->title);
        $this->notice->link                 =$request->link;
        if ($request->status==1)
        {
            $this->notice->status           =$request->status;
        }
        else
        {
            $this->notice->status           =2;
        }
        $this->notice->save();
        Alert::Success('Notice Update Successfully.','');
        return redirect()->route('notice.manage');
    }
    public function delete($id)
    {
        $this->notice=Noticee::find($id);
        $this->notice->delete();
        Alert::Success('Notice Delete Successfully.','');
        return redirect()->route('notice.manage');
    }
}
