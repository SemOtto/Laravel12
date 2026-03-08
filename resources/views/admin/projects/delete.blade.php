@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Delete Project</h1>
    <p class="mb-4">Are you sure you want to delete this project?</p>
    <form method="POST" action="{{ route('projects.destroy', $project) }}">
        @csrf
        @method('DELETE')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" disabled>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100" rows="4" disabled>{{ $project->description }}</textarea>
        </div>
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
        <a href="{{ route('projects.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</a>
    </form>
</div>
@endsection