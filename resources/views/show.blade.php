@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" 
            class="link">
            Back to Task List
        </a>
    </div>
    <p class="mb-4 text-slate-700">
        {{ $task->description }}
    </p>
    <p class="mb-4">Created {{ $task->created_at->diffForHumans() }} | Updated {{ $task->updated_at->diffForHumans() }}</p>
    <p class="mb-4">Status: 
        <span @class([
            'text-green-500' => $task->completed,
            'text-red-500' => !$task->completed
        ])>
            {{ $task->completed ? 'Completed' : 'Incomplete' }}
        </span>
    </p>
    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', $task) }}" 
            class="btn">
            Edit
        </a>

        <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST" style="display: inline-block">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection