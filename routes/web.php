<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/', function () {
    $tasks = Task::all();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::find($id);
    if (!$task) {
        abort(404);
    }
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');
