@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <p>
        {{ $task->description }}
    </p>
    <div>
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST" style="display: inline-block">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-secondary">
                {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
            </button>
        </form>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection