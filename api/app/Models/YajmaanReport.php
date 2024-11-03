<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YajmaanReport extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'yajmaan_name',
        'relation',
        'relname',
        'toexp',
        'poexp',
        'moexp',
        'yajmaan_street',
        'yajmaan_location',
        'report_key'
    ];
}