<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ReporterController extends Controller
{
    private $repoter;
    public function index()
    {
        return view('admin.reporter.index');
    }
    public function create(Request $request)
    {
        Reporter::newReporter($request);
        Alert::Success('Reporter Add Successfully','');
        return redirect()->back();
    }
    public function manage()
    {
        return view('admin.reporter.manage',['reporters'=>Reporter::orderBy('id','desc')->get()]);
    }
    public function edit(Reporter $request,$id)
    {
        $this->repoter=Reporter::find($id);
        return view('admin.reporter.edit',['reporter'=>$this->repoter]);

    }
    public function update(Request $request,$id)
    {
        Reporter::updateReporter($request,$id);
        Alert::Success('Reporter Update Successfully','');
        return redirect()->route('reporter.manage');
    }
    public function delete($id)
    {
        $this->repoter=Reporter::find($id);
        if (file_exists($this->repoter->image))
        {
            unlink($this->repoter->image);
        }
        $this->repoter->delete();
        Alert::Success('Reporter Delete Successfully','');
        return redirect()->route('reporter.manage');
    }
}
