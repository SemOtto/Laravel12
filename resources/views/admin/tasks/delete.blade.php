@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Delete Task</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Task</label>
            <input type="text" name="task" value="{{ $task->task }}" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Begindate</label>
            <input type="date" name="begindate" value="{{ $task->begindate }}" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Enddate</label>
            <input type="date" name="enddate" value="{{ $task->enddate }}" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">User</label>
            <select name="user_id" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
                <option value="{{ $task->user_id }}">{{ $task->user->name ?? 'N/A' }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Project</label>
            <select name="project_id" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
                <option value="{{ $task->project_id }}">{{ $task->project->name }}</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Activity</label>
            <select name="activity_id" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
                <option value="{{ $task->activity_id }}">{{ $task->activity->name }}</option>
            </select>
        </div>
    </div>
    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete Task</button>
        <a href="{{ route('tasks.show', $task) }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</a>
    </form>
</div>
@endsection