<?php

namespace App\Http\Controllers;

use App\Fault_Details;
use App\Faults;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FaultsController extends Controller
{
    public function show()
    {
        $faults = Faults::all();
        $staff = Staff::all();
        $fault_details = Fault_Details::all();
        View::share('fault_details', $fault_details);
        View::share('faults', $faults);
        View::share('staff', $staff);
        return view('menu.fault');
    }

    public function create(Request $request)
    {
        $faults = new Faults();
        $faults->made_by_that_staff = $request->made_by_that_staff;
        $faults->person_receiving_feedback = $request->person_receiving_feedback;
        $faults->fault_type = $request->fault_type;
        $faults->fault_amount = $request->fault_amount;
        $faults->fault_description = $request->fault_description;

        $faults->save();

        return redirect()->route('show_fault');
    }

    public function edit(Request $request, $id)
    {
        $faults = Faults::find($id);
        $faults->made_by_that_staff = $request->made_by_that_staff;
        $faults->person_receiving_feedback = $request->person_receiving_feedback;
        $faults->fault_type = $request->fault_type;
        $faults->fault_amount = $request->fault_amount;
        $faults->fault_description = $request->fault_description;

        $faults->save();

        return redirect()->route('show_fault');
    }

    public function create_fault_detail(Request $request)
    {
        $detail = new Fault_Details();
        $detail->fault_name = $request->fault_name;

        $detail->save();
        return redirect()->route('show_fault');
    }
}
