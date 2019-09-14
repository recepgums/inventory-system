<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'staff_name', 'position_of_staff', 'staff_salary', 'staff_rank'
    ];

    public function position()
    {
        return $this->belongsTo(Positions::class, 'position_of_staff');
    }

    public function staff_task()
    {
        return $this->hasMany(AssignmentTasks::class, 'user_id');
    }
}

