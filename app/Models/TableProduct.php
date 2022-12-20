<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableProduct extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    //protected $fillable = ['file','keterangan'];
}
