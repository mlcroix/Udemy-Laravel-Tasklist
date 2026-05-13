<?php

use Illuminate\Support\Facades\Route;

class Task {
    public function __construct(
        public int $id,
        public string $name
        ) {
    }
}

Route::get('/', function () {
    return view('index', [
        'tasks' => [
            new Task(1, 'Go to the store'),
            new Task(2, 'Go to the bank'),
            new Task(3, 'Go to the post office')
        ]
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => new Task($id, 'Go to the store')
    ]);
})->name('tasks.show');
