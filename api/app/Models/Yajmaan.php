<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yajmaan extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'yajmaan_name',
        'purohit',
        'additional_purohit',
        'contact_no',
        'yajmaan_location',
        'yajmaan_street'
    ];
}
