<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentTasks extends Model
{
    public $table="user_tasks";
    protected $fillable=[
        'user_id', 'task_id'
    ];

    public  function staff(){
        return $this->belongsTo(Staff::class, 'user_id');
    }

    public function task(){
        return $this->belongsTo(Tasks::class, 'task_id');
    }
}
