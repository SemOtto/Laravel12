@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Task Details</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <strong>Task ID:</strong> {{ $task->id }}
        </div>
        <div class="mb-4">
            <strong>Task:</strong> {{ $task->task }}
        </div>
        <div class="mb-4">
            <strong>Begindate:</strong> {{ $task->begindate }}
        </div>
        <div class="mb-4">
            <strong>Enddate:</strong> {{ $task->enddate ?? 'N/A' }}
        </div>
        <div class="mb-4">
            <strong>User:</strong> {{ $task->user->name ?? 'N/A' }}
        </div>
        <div class="mb-4">
            <strong>Project:</strong> {{ $task->project->name }}
        </div>
        <div class="mb-4">
            <strong>Activity Status:</strong> {{ $task->activity->name }}
        </div>
        <div class="mb-4">
            <strong>Created At:</strong> {{ $task->created_at }}
        </div>
    </div>
    <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Back to Tasks</a>
</div>
@endsection