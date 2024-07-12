@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-5">Tasks</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus-circle mr-2"></i>Create New Task</a>
    <div class="table-responsive">
        <table class="table table-bordered rounded shadow">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <td>{{ ($tasks->currentPage() - 1) * $tasks->perPage() + $loop->iteration }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td class="align-middle">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('tasks.show', $task->id) }}"><i class="far fa-eye"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit', $task->id) }}"><i class="far fa-edit"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                        Data Belum Tersedia
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $tasks->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
