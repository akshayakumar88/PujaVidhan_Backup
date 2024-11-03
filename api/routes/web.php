<?php

use Illuminate\Support\Facades\Route;
use App\Models\Report;
use App\Models\YajmaanReport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\YajmaanController;
use App\Http\Controllers\YajmaanRelativeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/report/offeringlist/{id}', function (\Illuminate\Http\Request $request, $id) {
    // if(!$request->hasValidSignature()){
    //     abort(401);
    // }
    Log::info('$id= '.$id);
    $list = Report::where('report_key', $id)->get();
    Log::info($list);
    return view('report', ['list' => $list]);
})->name('share-list')->middleware('signed');

Route::get('/report/yajmaanlist/{id}', function (\Illuminate\Http\Request $request, $id) {
    // if(!$request->hasValidSignature()){
    //     abort(401);
    // }
    Log::info('$id= '.$id);
    $list = YajmaanReport::where('report_key', $id)->get();
    Log::info($list);
    return view('yajmaan_report', ['list' => $list]);
})->name('share-yajmaan-list')->middleware('signed');

// Route::get('/playground', function () {
//     $url = URL::temporarySignedRoute('share-list', now()->addSeconds(30),123);
//     return $url;
// });

// Route::get('/getSortUrl', function (\Illuminate\Http\Request $request) {
//     $shortURLObject = ShortURL::destinationUrl($request->url)->make();
//     $shortURL = $shortURLObject->default_short_url;
//     return $shortURL;
// });

//items
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/details/{id}', [ItemController::class, 'details'])->name('items.details');
Route::get('/items/add', [ItemController::class, 'add'])->name('items.add');
Route::post('/items/insert', [ItemController::class, 'insert'])->name('items.insert');
Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');
Route::get('/items/delete/{id}', [ItemController::class, 'delete'])->name('items.delete');

//catagories
Route::get('/catagories', [CatagoryController::class, 'index'])->name('catagories.index');
Route::get('/catagories/details/{id}', [CatagoryController::class, 'details'])->name('catagories.details');
Route::get('/catagories/add', [CatagoryController::class, 'add'])->name('catagories.add');
Route::post('/catagories/insert', [CatagoryController::class, 'insert'])->name('catagories.insert');
Route::get('/catagories/edit/{id}', [CatagoryController::class, 'edit'])->name('catagories.edit');
Route::post('/catagories/update/{id}', [CatagoryController::class, 'update'])->name('catagories.update');
Route::get('/catagories/delete/{id}', [CatagoryController::class, 'delete'])->name('catagories.delete');

//yajmaans
Route::get('/yajmaans', [YajmaanController::class, 'index'])->name('yajmaans.index');
Route::get('/yajmaans/details/{id}', [YajmaanController::class, 'details'])->name('yajmaans.details');
Route::get('/yajmaans/add', [YajmaanController::class, 'add'])->name('yajmaans.add');
Route::post('/yajmaans/insert', [YajmaanController::class, 'insert'])->name('yajmaans.insert');
Route::get('/yajmaans/edit/{id}', [YajmaanController::class, 'edit'])->name('yajmaans.edit');
Route::post('/yajmaans/update/{id}', [YajmaanController::class, 'update'])->name('yajmaans.update');
Route::get('/yajmaans/delete/{id}', [YajmaanController::class, 'delete'])->name('yajmaans.delete');

//yajmaan_relatives
Route::get('/yajmaan_relatives', [YajmaanRelativeController::class, 'index'])->name('yajmaan_relatives.index');
Route::get('/yajmaan_relatives/details/{id}', [YajmaanRelativeController::class, 'details'])->name('yajmaan_relatives.details');
Route::get('/yajmaan_relatives/add', [YajmaanRelativeController::class, 'add'])->name('yajmaan_relatives.add');
Route::post('/yajmaan_relatives/insert', [YajmaanRelativeController::class, 'insert'])->name('yajmaan_relatives.insert');
Route::get('/yajmaan_relatives/edit/{id}', [YajmaanRelativeController::class, 'edit'])->name('yajmaan_relatives.edit');
Route::post('/yajmaan_relatives/update/{id}', [YajmaanRelativeController::class, 'update'])->name('yajmaan_relatives.update');
Route::get('/yajmaan_relatives/delete/{id}', [YajmaanRelativeController::class, 'delete'])->name('yajmaan_relatives.delete');

