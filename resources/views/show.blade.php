@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <p>
        {{ $task->description }}
    </p>
@endsection