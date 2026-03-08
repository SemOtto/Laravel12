@extends('layouts.layoutpublic')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Public Projects</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($projects as $project)
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="mb-2">
                <strong class="text-gray-600">ID:</strong>
                <span class="text-gray-800">{{ $project->id }}</span>
            </div>
            <h2 class="text-xl font-semibold mb-2">{{ $project->name }}</h2>
            <p class="text-gray-700">{{ Str::limit($project->description, 350) }}</p>
        </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="mt-8">
        {{ $projects->links() }}
    </div>
</div>
@endsection
