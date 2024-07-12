@extends('layouts.auth')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>User Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
@endsection
