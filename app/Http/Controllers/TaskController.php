<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page',5);

        $tasks = Task::where('status','Pending')
                ->orWhere('status','Ongoing')
                ->orderBy('deadline','ASC')
                ->orderByRaw("FIELD(priority,'High','Medium','Low')")
                ->paginate($perPage);

        return view('tasks.index',compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string',
            'deadline' => 'required|date',
            'description' => 'required|string|max:255',
            'priority' => 'required|in:High,Medium,Low'
        ]);

        Task::create($request->all());

        return redirect()->route('task.index')->with('success','Tasks successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.edit',compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tasks = Task::findOrFail($id);

        $request->validate([
            'task_name' => 'required|string',
            'deadline' => 'required|date',
            'description' => 'required|string|max:255',
            'priority' => 'nullable|in:High,Medium,Low'
        ]);

        $tasks->update($request->all());

        return redirect()->route('task.index')->with('success','Tasks successfully updated!');

    }

    public function done($id)
    {
        $tasks = Task::findOrFail($id);

            $tasks->status = "Completed";
            $tasks->save();


        return redirect()->route('task.index')->with('success','Tasks is completed!');
    }

    public function ongoing($id)
    {
        $tasks = Task::findOrFail($id);

            $tasks->status = "Ongoing";
            $tasks->save();


        return redirect()->route('task.index')->with('success','Tasks is Ongoing!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);

        $tasks->delete();

        return redirect()->route('task.index')->with('success','Tasks successfully deleted!');
    }
}
