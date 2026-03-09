@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Create Task</h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-4">
            <label for="task" class="block text-gray-700">Task</label>
            <input type="text" name="task" id="task" value="{{ old('task') }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>
            @error('task')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="begindate" class="block text-gray-700">Begindate</label>
            <input type="date" name="begindate" id="begindate" value="{{ old('begindate') }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>
            @error('begindate')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="enddate" class="block text-gray-700">Enddate</label>
            <input type="date" name="enddate" id="enddate" value="{{ old('enddate') }}" class="w-full px-3 py-2 border border-gray-300 rounded">
            @error('enddate')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="user_id" class="block text-gray-700">User</label>
            <select name="user_id" id="user_id" class="w-full px-3 py-2 border border-gray-300 rounded">
                <option value="">Select a user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="project_id" class="block text-gray-700">Project</label>
            <select name="project_id" id="project_id" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                <option value="">Select a project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="activity_id" class="block text-gray-700">Activity</label>
            <select name="activity_id" id="activity_id" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                <option value="">Select an activity</option>
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}" {{ old('activity_id') == $activity->id ? 'selected' : '' }}>{{ $activity->name }}</option>
                @endforeach
            </select>
            @error('activity_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
    </form>
</div>
@endsection