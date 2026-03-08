<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index task');

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

        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create task');

        // Implementation for storing a task
        return response()->json(['message' => 'Task created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('show task');

        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('edit task');

        return view('admin.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('edit task');

        // Implementation for updating a task
        return response()->json(['message' => 'Task updated']);
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
