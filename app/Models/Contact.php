<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Thêm dòng này

class Contact extends Model
{
    use HasFactory, SoftDeletes;  // Thêm SoftDeletes vào đây

    protected $table = "contact";
}
