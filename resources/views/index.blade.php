@extends('layouts.app')
@section('title', 'Task List')
@section('content')
    <a href="{{ route('tasks.create') }}" class="link">Create New Task</a>

    @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <div>
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                        @class(['line-through' => $task->completed])>{{ $task->title }}
                    </a>
                </div>
            @endforeach
    @else
        <p>No tasks found.</p>
    @endif

    @if ($tasks->count())
        <nav>
            {{$tasks->links()}}
        </nav>
    @endif
@endsection