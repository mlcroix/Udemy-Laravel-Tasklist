@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
     @isset($errors)
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    @endisset

    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @method(isset($task) ? 'PUT' : 'POST')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $task->description ?? old('description') }}</textarea>
        </div>
        <div>
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description" required>{{ $task->long_description ?? old('long_description') }}</textarea>
        </div>
        <button type="submit">{{ isset($task) ? 'Update Task' : 'Create Task' }}</button>
    </form>
@endsection