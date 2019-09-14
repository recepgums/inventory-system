<?php

namespace App\Http\Controllers;

use App\AssignmentTasks;
use App\Staff;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AssignmentTasksController extends Controller
{
    public function show()
    {
        $staff = Staff::all();
        $tasks = Tasks::all();
        $assignment = AssignmentTasks::all();
        View::share('assignment', $assignment);
        View::share('staff', $staff);
        View::share('tasks', $tasks);
        return view('menu.assignment');
    }

    public function create(Request $request)
    {
        $assignment = new AssignmentTasks;
        $assignment->user_id = $request->user_id;
        $assignment->task_id = $request->task_id;

        $assignment->save();
        return redirect()->route('show_assignment_tasks');
    }

    public function edit(Request $request, $id)
    {
        AssignmentTasks::where('user_id', $id)->delete();
        foreach ($request->task_id as $task_id) {
            $new = new AssignmentTasks();
            $new->user_id = $id;
            $new->task_id = $task_id;

            $new->save();
        }
        return redirect()->route('show_assignment_tasks');
    }
}
