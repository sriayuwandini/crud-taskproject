@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card mt-5 shadow" style="width: 50rem;">
        <div class="card-body">
        <div class="card-header bg-info text-white">
            <h2 class="card-title text-center">Task Edit</h2>
        </div>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" value="{{ $task->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description"><strong>Description:</strong></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:150px" name="description" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
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
