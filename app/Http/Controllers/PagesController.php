<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
        $tasks = Task::where('status','Pending')
                 ->where('priority','High')
                 ->orderBy('deadline','ASC')
                 ->take(3)
                 ->get();
        $tasksAll = Task::count();

        $tasksPending = Task::where('status','Pending')->count();

        $tasksDone = Task::where('status','Completed')->count();

        return view('pages.dashboard',compact('tasks','tasksAll','tasksPending','tasksDone'));
    }

    public function completed(Request $request)
    {
        $perPage = $request->input('per_page',5);

        $tasks = Task::where('status','Completed')
                ->orderBy('deadline','ASC')
                ->orderByRaw("FIELD(priority,'High','Medium','Low')")
                ->paginate($perPage);

        return view('pages.completed',compact('tasks'));
    }
}
