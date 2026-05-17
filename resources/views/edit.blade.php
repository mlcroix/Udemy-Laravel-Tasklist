@extends('layouts.app')

@section('title', 'Edit Task')
@section('content')
    @isset($errors)
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    @endisset

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $task->description) }}</textarea>
        </div>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description" required>{{ old('long_description', $task->long_description) }}</textarea>
        </div>
        <button type="submit">Update Task</button>

@endsection