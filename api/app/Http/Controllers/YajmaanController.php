<?php

namespace App\Http\Controllers;

use App\Models\Yajmaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class YajmaanController extends Controller
{
    public function index(){
        $yajmaans = Yajmaan::orderBy('created_at','desc')->get();
        return view('yajmaans.index', ['yajmaans' => $yajmaans]);
    }
    
    public function details($id){
        $yajmaan = Yajmaan::find($id);
        return view('yajmaans.details', ['yajmaan' => $yajmaan]);
    }
    
    public function add(){
        return view('yajmaans.add');
    }
    
    public function insert(Request $request){
        $this->validate($request, [
            'yajmaan_name' => 'required',
            'purohit' => 'required',
            'additional_purohit' => 'required',
            'contact_no' => '',
            'yajmaan_location' => 'required',
            'yajmaan_street' => 'required'
        ]);
        $yajmaanData = $request->all();
        Yajmaan::create($yajmaanData);
        Session::flash('success_msg', 'Yajmaan added successfully!');
        return redirect()->route('yajmaans.index');
    }
    
    public function edit($id){
        $yajmaan = Yajmaan::find($id);
        return view('yajmaans.edit', ['yajmaan' => $yajmaan]);
    }
    
    public function update($id, Request $request){
        $this->validate($request, [
            'yajmaan_name' => 'required',
            'purohit' => 'required',
            'additional_purohit' => 'required',
            'contact_no' => '',
            'yajmaan_location' => 'required',
            'yajmaan_street' => 'required'
        ]);
        $yajmaanData = $request->all();
        Yajmaan::find($id)->update($yajmaanData);
        Session::flash('success_msg', 'Yajmaan updated successfully!');
        return redirect()->route('yajmaans.index');
    }
    
    public function delete($id){
        Yajmaan::find($id)->delete();
        Session::flash('success_msg', 'Yajmaan deleted successfully!');
        return redirect()->route('yajmaans.index');
    }
    
}
