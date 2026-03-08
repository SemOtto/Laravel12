@extends('layouts.layoutadmin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Projects</h1>
    @if(session('status') || session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status', session('success')) }}
        </div>
    @endif
    <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Create New Project</a>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td class="py-2 px-4 border-b">{{ $project->id }}</td>
                <td class="py-2 px-4 border-b">{{ $project->name }}</td>
                <td class="py-2 px-4 border-b">{{ Str::limit($project->description, 50) }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('projects.show', $project) }}" class="text-green-500 hover:text-green-700 mr-2">Show</a>
                    <a href="{{ route('projects.edit', $project) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                    @can('delete project')
                        <a href="{{ route('projects.delete', $project) }}" class="text-red-500 hover:text-red-700">Delete</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection