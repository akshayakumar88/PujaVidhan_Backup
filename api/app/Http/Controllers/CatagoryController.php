<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class CatagoryController extends Controller
{
    public function index(){
        $catagories = Catagory::orderBy('created_at','desc')->get();
        return view('catagories.index', ['catagories' => $catagories]);
    }
    
    public function details($id){
        $catagory = Catagory::find($id);
        return view('catagories.details', ['catagory' => $catagory]);
    }
    
    public function add(){
        return view('catagories.add');
    }
    
    public function insert(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'catimg' => ''
        ]);
        $catagoryData = $request->all();
        Catagory::create($catagoryData);
        Session::flash('success_msg', 'Catagory added successfully!');
        return redirect()->route('catagories.index');
    }
    
    public function edit($id){
        $catagory = Catagory::find($id);
        return view('catagories.edit', ['catagory' => $catagory]);
    }
    
    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'catimg' => ''
        ]);
        $catagoryData = $request->all();
        Catagory::find($id)->update($catagoryData);
        Session::flash('success_msg', 'Catagory updated successfully!');
        return redirect()->route('catagories.index');
    }
    
    public function delete($id){
        Catagory::find($id)->delete();
        Session::flash('success_msg', 'Catagory deleted successfully!');
        return redirect()->route('catagories.index');
    }
    
}
