@extends('layouts.app')
@section('title', 'Task List')
@section('content')
    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No tasks found.</p>
    @endif
@endsection