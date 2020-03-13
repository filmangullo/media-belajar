<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $filable = [
        'nama',
        'alamat'
    ];
}
