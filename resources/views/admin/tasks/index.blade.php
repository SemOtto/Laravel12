@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Tasks</h1>
    @if(session('status') || session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status', session('success')) }}
        </div>
    @endif
    <table class="min-w-full bg-white border border-gray-300">
        <tbody>
            <tr>
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Task</th>
                <th class="py-2 px-4 border-b text-left">Begin Date</th>
                <th class="py-2 px-4 border-b text-left">End Date</th>
                <th class="py-2 px-4 border-b text-left">User</th>
                <th class="py-2 px-4 border-b text-left">Project</th>
                <th class="py-2 px-4 border-b text-left">Activity</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
            @foreach($tasks as $task)
            <tr data-id="{{ $task->id }}">
                <td class="py-2 px-4 border-b">{{ $task->id }}</td>
                <td class="py-2 px-4 border-b">{{ Str::limit($task->task, 50) }}</td>
                <td class="py-2 px-4 border-b">{{ $task->begindate }}</td>
                <td class="py-2 px-4 border-b">{{ $task->enddate ?? '' }}</td>
                <td class="py-2 px-4 border-b">{{ $task->user ? $task->user->name : 'N/A' }}</td>
                <td class="py-2 px-4 border-b">{{ $task->project->name }}</td>
                <td class="py-2 px-4 border-b">{{ $task->activity->name }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('tasks.show', $task) }}" class="text-green-500 hover:text-green-700 mr-2">Show</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                    <a href="{{ route('tasks.delete', $task) }}" class="text-red-500 hover:text-red-700">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
