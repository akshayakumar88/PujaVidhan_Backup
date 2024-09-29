<?php

namespace App\Http\Controllers;

use App\Models\YajmaanRelative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class YajmaanRelativeController extends Controller
{
    public function index(){
        $yajmaan_relatives = YajmaanRelative::orderBy('created_at','desc')->get();
        return view('yajmaan_relatives.index', ['yajmaan_relatives' => $yajmaan_relatives]);
    }
    
    public function details($id){
        $yajmaan_relative = YajmaanRelative::find($id);
        return view('yajmaan_relatives.details', ['yajmaan_relative' => $yajmaan_relative]);
    }
    
    public function add(){
        return view('yajmaan_relatives.add');
    }
    
    public function insert(Request $request){
        $this->validate($request, [
            'relname' => 'required',
            'relation' => 'required',
            'toexp' => 'required',
            'poexp' => 'required',
            'moexp' => 'required',
            'doexp' => '',
            'yajmaan_id' => 'required'
        ]);
        $yajmaan_relativeData = $request->all();
        YajmaanRelative::create($yajmaan_relativeData);
        Session::flash('success_msg', 'YajmaanRelative added successfully!');
        return redirect()->route('yajmaan_relatives.index');
    }
    
    public function edit($id){
        $yajmaan_relative = YajmaanRelative::find($id);
        return view('yajmaan_relatives.edit', ['yajmaan_relative' => $yajmaan_relative]);
    }
    
    public function update($id, Request $request){
        $this->validate($request, [
            'relname' => 'required',
            'relation' => 'required',
            'toexp' => 'required',
            'poexp' => 'required',
            'moexp' => 'required',
            'doexp' => '',
            'yajmaan_id' => 'required'
        ]);
        $yajmaan_relativeData = $request->all();
        YajmaanRelative::find($id)->update($yajmaan_relativeData);
        Session::flash('success_msg', 'YajmaanRelative updated successfully!');
        return redirect()->route('yajmaan_relatives.index');
    }
    
    public function delete($id){
        YajmaanRelative::find($id)->delete();
        Session::flash('success_msg', 'YajmaanRelative deleted successfully!');
        return redirect()->route('yajmaan_relatives.index');
    }
}
