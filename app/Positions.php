<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    public $table = "positions";
    protected $fillable=[
        'position_name'
    ];
}
