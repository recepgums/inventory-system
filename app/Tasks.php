<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public $table="tasks";

    protected $fillable=[
        'task_name'
    ];

    public function user_task(){
        return $this->hasMany(AssignmentTasks::class, 'task_id');
    }
}
