<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'package_name', 'package_count', 'storage_for_package'
    ];
}
