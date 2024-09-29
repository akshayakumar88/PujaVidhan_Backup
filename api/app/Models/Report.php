<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'isItmSubCat',
        'item_sub_cat',
        'item_name',
        'quantity',
        'unit',
        'user_id',
        'cat_id',
        'cat_name',
        'report_key',
    ];
}
