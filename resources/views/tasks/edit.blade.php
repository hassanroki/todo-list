@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Edit Task</h1>
            <a href="{{ route('task.index') }}" class="btn btn-info">
                <h6>Back</h6>
            </a>
        </div>
        <hr>
        <form action="{{ route('task.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $task->description }}</textarea>
            </div>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group mb-3">
                <label for="completed">Status</label>
                <select name="completed" class="form-control">
                    <option value="0" {{ !$task->completed ? 'selected' : '' }}>Incomplete</option>
                    <option value="1" {{ $task->completed ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            @error('completed')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
