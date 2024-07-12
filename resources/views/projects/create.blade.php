@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-5">Create New Project</h2>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="task_id"><strong>Task Name:</strong></label>
                    <select name="task_id" class="form-control @error('task_id') is-invalid @enderror">
                        <option value="" disabled selected>Pilih Task</option>
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->name }}</option>
                        @endforeach
                    </select>
                    @error('task_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name"><strong>Deskripsi:</strong></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Description" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="deadline"><strong>Deadline:</strong></label>
                    <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" placeholder="Masukkan deadline" value="{{ old('deadline') }}">
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Submit</button>
                <a class="btn btn-secondary" href="{{ route('projects.index') }}"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
    </form>
</div>
@endsection