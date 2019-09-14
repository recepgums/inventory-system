<?php

namespace App\Http\Controllers;

use App\Positions;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StaffController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pin' => ['required', 'integer', 'min:4']
        ]);
    }
    public function show()
    {
        $position = Positions::all();
        $staff = Staff::all();
        View::share('position', $position);
        View::share('staff', $staff);
        return view('menu.staff');
    }

    public function create(Request $request)
    {
        $staff = new Staff();
        $staff->staff_name = $request->staff_name;
        $staff->position_of_staff = $request->position_of_staff;
        $staff->staff_salary = $request->staff_salary;
        $staff->staff_rank = $request->staff_rank;
        $staff->pin = $request->pin;

        $staff->save();
        return redirect()->route('show_staff');
    }

    public function edit(Request $request, $id)
    {
        $staff = Staff::find($id);
        $staff->staff_name = $request->staff_name;
        $staff->position_of_staff = $request->position_of_staff;
        $staff->staff_salary = $request->staff_salary;
        $staff->staff_rank = $request->staff_rank;
        $staff->pin = $request->pin;

        $staff->save();
        return redirect()->route('show_staff');
    }

    public function create_position(Request $request)
    {
        $position = new Positions();
        $position->position_name=$request->position_name;

        $position->save();
        return redirect()->route('show_staff');
    }
}
