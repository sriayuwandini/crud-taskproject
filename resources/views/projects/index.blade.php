@extends('layouts.app')

@section('content')
<div class="container">
    
    <h2 class="mt-5">Projects</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container 6">
        <div class="row">
    <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus-circle mr-2"></i>Create New Project</a>
    <form class="form-inline ml-auto search-form mb-3" action="{{ route('search') }}" method="GET">
        <div class="input-group">
        <div class="input-group-prepend">
            <button type="button" class="btn btn-outline-secondary bg-info text-white rounded-pill" onclick="window.location.href='{{ route('projects.index') }}'">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
            <input class="form-control border-end-0 border rounded-pill" type="text" name="query" placeholder="Cari Tabel" aria-label="Cari">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary bg-info text-white rounded-pill ms-n5" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered rounded shadow">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Task Name</th>
                    <th>Project Name</th>
                    <th>Image</th>
                    <th>Deadline</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr>
                    <td>{{ ($projects->currentPage() - 1) * $projects->perPage() + $loop->iteration }}</td>
                    <td>{{ $project->task->name }}</td>
                    <td>{{ $project->name }}</td>
                    <td>
                    @if ($project->image)
                    <img src="{{ asset('storage/projects/' . $project->image) }}" alt="image" width="150">
                    @else
                        No Image
                    @endif
                    </td>
                    <td>{{ $project->deadline }}</td>
                    <td class="align-middle">
                        <form onsubmit="return confirm('Apakah Anda Yakin')"  action="{{ route('projects.destroy', $project->id) }}" method="POST" enctype="multipart/form-data">
                            <a class="btn btn-info btn-sm" href="{{ route('projects.show', $project->id) }}"><i class="far fa-eye"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('projects.edit', $project->id) }}"><i class="far fa-edit"></i> Edit</a>
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
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
