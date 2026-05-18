@extends('layouts.app')
@section('title', 'Task List')
@section('content')
    <a href="{{ route('tasks.create') }}">Create New Task</a>

    @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <div>
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"> {{ $task->title }}</a>
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