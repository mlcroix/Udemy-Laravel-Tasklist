@extends('layouts.app')

@section('title', $task->name)
@section('content')
    <p>
        {{ $task->description }}
    </p>
@endsection