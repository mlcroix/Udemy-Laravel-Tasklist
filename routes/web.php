<?php

use Illuminate\Support\Facades\Route;

class Task {
    public function __construct(
        public int $id,
        public string $name,
        public string $description = ''
        ) {
    }
}

$tasks = [
            new Task(1, 'Go to the store', 'Get milk and bread'),
            new Task(2, 'Go to the bank', 'Deposit paycheck'),
            new Task(3, 'Go to the post office', 'Send package')
        ];

Route::get('/', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);
    if (!$task) {
        abort(404);
    }
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');
