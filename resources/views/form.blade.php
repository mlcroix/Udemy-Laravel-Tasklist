@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
     @isset($errors)
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endisset

    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @method(isset($task) ? 'PUT' : 'POST')
        <div class="mb-4">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}" required>
        </div>
        <div class="mb-4">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $task->description ?? old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description" required>{{ $task->long_description ?? old('long_description') }}</textarea>
        </div>
        <div class="flex gap-2 items-center">
            <button type="submit" class="btn">
                {{ isset($task) ? 'Update Task' : 'Create Task' }}
            </button>
            <a href="{{ route('tasks.index') }}" class="link">
                Cancel
            </a>
        </div>
    </form>
@endsection