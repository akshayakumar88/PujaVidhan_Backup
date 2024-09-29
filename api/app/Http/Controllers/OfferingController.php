<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\Item;
use App\Models\Report;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use AshAllenDesign\ShortURL\Facades\ShortURL;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OfferingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function getCatagoryList()
    {
        $catagory_list = Catagory::all()->toArray();
        return $catagory_list;    
    }
    public function getItemList($catId)
    {
        $item_list = Item::where('catagory_id',$catId)->get()->toArray();
        return $item_list;   
    }
    public function saveOfferingList(Request $request){
        Log::info($request);
        $key = uniqid();
        for($n=0;$n<(count(json_decode($request->getContent(), true)));$n++){
            $report = new Report([
                'report_key' => $key,
                'item_sub_cat' => $request[$n]['item_sub_cat'],
                'isItmSubCat' => $request[$n]['isItmSubCat'],
                'item_name' => $request[$n]['item_name'],
                'quantity' => $request[$n]['quantity'],
                'unit' => $request[$n]['unit'],
                'cat_id' => $request[$n]['cat_id'],
                'cat_name' => $request[$n]['cat_name'],
                'user_id' => $request[$n]['user_id']
            ]);
            $report->save();    
        }
        $url = URL::temporarySignedRoute('share-list', now()->addSeconds(3000),$key);
        $shortURLObject = ShortURL::destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;
        return response()->json([
            'shortURL' => $shortURL,
            'message' => 'success'
        ]);
    }
    public function getData()
    {
        $data = DB::table('catagories')
            ->join('items', 'catagories.id', '=', 'items.catagory_id')
            ->select('catagories.name as f', 'items.*')
            ->get();
        dd($data);
    }
    public function cleanData()
    {
        $reports = \App\Models\Report::whereDate('created_at', '<=', now()->subDays(30))->delete();
    }


    public function getPurohitList($username)
    {
         $user = DB::table('users')->where('username',$username)->get();
        $data = DB::table('yajmaans')
            ->select('purohit', 'additional_purohit','yajmaan_location')
            ->where('purohit',$user[0]->username)
            ->orWhere('additional_purohit',$user[0]->username)
            ->get();
        return $data;
    }
    public function getYajmaanList($purohit, $additionalpurohit, $location)
    {
        $yajmaans = DB::table('yajmaans')->where([
            ['yajmaan_location', '=', $location],
            ['purohit', '=', $purohit],
            ['additional_purohit', '=', $additionalpurohit],
        ])->get();
        foreach($yajmaans as $key =>$yajmaan){
            $yajmaan_relative = DB::table('yajmaan_relatives')
            ->where('yajmaan_id',$yajmaan->id)
            ->select('yajmaan_relatives.*')
            ->get();
            $yajmaans[$key]->relatives = $yajmaan_relative;
        }
        return $yajmaans;
    }
}
