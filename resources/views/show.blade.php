@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <p>
        {{ $task->description }}
    </p>
    <div>
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection