@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            @if (session('success'))
                <div class="alert alert-success" id="removeMsg">
                    {{ session('success') }}
                </div>
            @endif

            <h1>All Task</h1>
            <a href="{{ route('task.create') }}" class="btn btn-info">
                <h6>New Create</h6>
            </a>
        </div>
        <hr>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Completed' : 'Incomplete' }}</td>
                        <td>
                            <a href="{{ route('task.edit', $task) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('task.destroy', $task) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
