@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Project Details</h1>
    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID:</strong> {{ $project->id }}</p>
        <p><strong>Name:</strong> {{ $project->name }}</p>
        <p><strong>Description:</strong> {{ $project->description }}</p>
        <p><strong>Created At:</strong> {{ $project->created_at->format('Y-m-d H:i:s') }}</p>
    </div>
    <a href="{{ route('projects.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Back to Projects</a>
</div>
@endsection