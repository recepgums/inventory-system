<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TasksController extends Controller
{
    public function show()
    {
        $tasks = Tasks::all();
        $staff = Staff::all();
        View::share('tasks', $tasks);
        return view('menu.tasks');
    }

    public function create(Request $request)
    {
        $tasks = new Tasks();
        $tasks->task_name = $request->task_name;

        $tasks->save();
        return redirect()->route('show_tasks');
    }
    public function edit(Request $request, $id)
    {
        $tasks = Tasks::find($id);
        $tasks->task_name = $request->task_name;

        $tasks->save();
        return redirect()->route('show_tasks');
    }
}
