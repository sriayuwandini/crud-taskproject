@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card mt-5 shadow" style="width: 50rem;">
        <div class="card-body">
            <div class="card-header bg-info text-white">
                <h2 class="card-title text-center">Project Details</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Task Name</th>
                            <td>{{ $project->task->name }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $project->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                @if ($project->image)
                                    <img src="{{ Storage::url('public/projects/' . $project->image) }}" class="img-fluid" alt="Project Image">
                                @else
                                    No image available
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                            <td>{{ $project->deadline }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a class="btn btn-secondary" href="{{ route('projects.index') }}"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
