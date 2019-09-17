<?php

namespace App\Http\Controllers;

use App\AssignmentTasks;
use App\Staff;
use App\Tasks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AssignmentTasksController extends Controller
{
    public function show()
    {
        $this->getUserTasks(1);
        $staff = Staff::all();
        $tasks = Tasks::all();
        $assignment = AssignmentTasks::all();
//        $chekbox=DB::table('user_tasks')
//            ->select(DB::raw('user_id,count(user_id)'))
//            ->groupBy(  'user_id')->orderBy('count(user_id)')
//            ->get();
//        dd($chekbox);
        View::share('assignment', $assignment);
        View::share('staff', $staff);
        View::share('tasks', $tasks);
        return view('menu.assignment');
    }

    public function getUserTasks($id)
    {
        //

        $tasks = AssignmentTasks::where('user_id', $id)->with('task')->get();
        //    dd($tasks);
        //     return $tasks;
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

    public function ajax(Request $request)
    {
        dd("dsa");
        $new = AssignmentTasks::where('user_id',$request->id);
        $new="dasassa";


        return response()->json(['success'=>$new]);
    }
}
