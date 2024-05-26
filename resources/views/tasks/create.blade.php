@extends('layouts.master')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Create Task</h1>
            <a href="{{ route('task.index') }}" class="btn btn-info">
                <h6>Back</h6>
            </a>
        </div>
        <hr>
        <div class="mt-3">
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
