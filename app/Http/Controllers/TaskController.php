<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\TaskStoreRequest;

class TaskController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tasks.index', [
            'tasks' => Task::with(['user', 'project', 'activity'])->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create task');

        return view('admin.tasks.create', [
            'users' => \App\Models\User::all(),
            'projects' => \App\Models\Project::all(),
            'activities' => \App\Models\Activity::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $this->authorize('create task');

        $task = new Task();
        $task->task = $request->task;
        $task->begindate = $request->begindate . ' 00:00:00';
        $task->enddate = $request->enddate ? $request->enddate . ' 00:00:00' : null;
        $task->user_id = $request->user_id;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->save();

        return redirect()->route('tasks.index')->with('status', 'Taak: ' . $task->task . ' is aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('show task');

        $task->load(['user', 'project', 'activity']);

        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('edit task');

        $task->load(['user', 'project', 'activity']);

        return view('admin.tasks.edit', [
            'task' => $task,
            'users' => \App\Models\User::all(),
            'projects' => \App\Models\Project::all(),
            'activities' => \App\Models\Activity::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStoreRequest $request, Task $task)
    {
        $this->authorize('edit task');

        $task->task = $request->task;
        // Only append time if the date string doesn't already contain a time component
        $task->begindate = strpos($request->begindate, ' ') === false ? $request->begindate . ' 00:00:00' : $request->begindate;
        $task->enddate = $request->enddate ? (strpos($request->enddate, ' ') === false ? $request->enddate . ' 00:00:00' : $request->enddate) : null;
        $task->user_id = $request->user_id;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->save();

        return redirect()->route('tasks.index')->with('status', 'Taak: ' . $task->task . ' is gewijzigd');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(Task $task)
    {
        $this->authorize('delete task');

        return view('admin.tasks.delete', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete task');

        // $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
