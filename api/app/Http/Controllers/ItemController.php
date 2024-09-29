<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class ItemController extends Controller
{
    public function index(){
        $items = Item::orderBy('created_at','desc')->get();
        return view('items.index', ['items' => $items]);
    }
    
    public function details($id){
        $item = Item::find($id);
        return view('items.details', ['item' => $item]);
    }
    
    public function add(){
        return view('items.add');
    }
    
    public function insert(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'unit' => '',
            'item_sub_cat' => 'required',
            'catagory_id' => ''
        ]);
        $itemData = $request->all();
        Item::create($itemData);
        Session::flash('success_msg', 'Item added successfully!');
        return redirect()->route('items.index');
    }
    
    public function edit($id){
        $item = Item::find($id);
        return view('items.edit', ['item' => $item]);
    }
    
    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'unit' => '',
            'item_sub_cat' => 'required',
            'catagory_id' => ''
        ]);
        $itemData = $request->all();
        Item::find($id)->update($itemData);
        Session::flash('success_msg', 'Item updated successfully!');
        return redirect()->route('items.index');
    }
    
    public function delete($id){
        Item::find($id)->delete();
        Session::flash('success_msg', 'Item deleted successfully!');
        return redirect()->route('items.index');
    }

}
