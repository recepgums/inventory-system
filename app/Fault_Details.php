<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fault_Details extends Model
{
    public $table = 'fault_details';
    protected $fillable = [
        'fault_name'
    ];
}
