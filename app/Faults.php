<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faults extends Model
{
    protected $fillable = [
        'made_by_that_staff', 'person_receiving_feedback', 'fault_type', 'fault_amount', 'fault_description'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'made_by_that_staff');
    }

    public function fault_receiving_by()
    {
        return $this->belongsTo(Staff::class, 'person_receiving_feedback');
    }
    public function fault_det()
    {
        return $this->belongsTo(Fault_Details::class, 'fault_type');
    }

}
