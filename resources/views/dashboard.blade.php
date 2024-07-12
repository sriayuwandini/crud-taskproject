@extends('layouts.auth')

@section('content')
<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Recent Tasks
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($tasks as $task)
                        <li class="list-group-item">{{ $task->title }}</li>
                    @empty
                        <li class="list-group-item">No tasks found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Recent Projects
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($projects as $project)
                        <li class="list-group-item">{{ $project->name }}</li>
                    @empty
                        <li class="list-group-item">No projects found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
