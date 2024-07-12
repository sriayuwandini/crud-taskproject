@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card mt-5 shadow" style="width: 50rem;">
        <div class="card-header bg-info text-white">
            <h2 class="card-title text-center">Task Details</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $task->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $task->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
            <a class="btn btn-secondary" href="{{ route('tasks.index') }}"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
