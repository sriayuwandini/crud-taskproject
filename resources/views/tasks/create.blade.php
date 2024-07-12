@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card mt-5 shadow" style="width: 50rem;">
        <div class="card-header bg-info text-white">
            <h2 class="card-title text-center">Create New Task</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter task name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description"><strong>Description:</strong></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Enter task description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Submit</button>
                    <a class="btn btn-secondary" href="{{ route('tasks.index') }}"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
