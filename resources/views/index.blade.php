<h1>
    Task List
</h1>

@if (count($tasks) > 0)
    <ul>
        @foreach ($tasks as $task)
             <li>{{ $task->name }}</li>
        @endforeach
    </ul>
@else
    <p>No tasks found.</p>
@endif