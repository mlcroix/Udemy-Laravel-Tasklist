@extends('layouts.app')
@section('title', 'Task List')
@section('content')
    @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <div>
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}"> {{ $task->title }}</a>
                </div>
            @endforeach
    @else
        <p>No tasks found.</p>
    @endif
@endsection