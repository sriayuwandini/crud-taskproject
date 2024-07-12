@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card mt-5 shadow" style="width: 50rem;">
        <div class="card-body">
            <div class="card-header bg-info text-white">
                <h2 class="card-title text-center">Edit Project</h2>
            </div>
            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="task_id"><strong>Task Name:</strong></label>
                    <select name="task_id" class="form-control @error('task_id') is-invalid @enderror">
                        <option value="" disabled {{ old('task_id', $project->task_id) === null ? 'selected' : '' }}>Pilih Task</option>
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}" {{ old('task_id', $project->task_id) == $task->id ? 'selected' : '' }}>{{ $task->name }}</option>
                        @endforeach
                    </select>
                    @error('task_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name"><strong>Deskripsi:</strong></label>
                    <input type="text" name="name" value="{{ old('name', $project->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Description">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deadline"><strong>Deadline:</strong></label>
                    <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline', $project->deadline) }}" placeholder="Masukkan deadline">
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Submit</button>
                    <a class="btn btn-secondary" href="{{ route('projects.index') }}"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
