<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;
use App\Models\Task;


Route::get('/', function () {
    $tasks = Task::all();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    $task->save();

    return redirect(route('tasks.show', ['task' => $task]))
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::addRoute(['PUT', 'PATCH'], '/tasks/{task}', function (TaskRequest $request, Task $task) {
    $attributes = $request->validated();
    $task->update($attributes);

    return redirect(route('tasks.show', ['task' => $task]))
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect(route('tasks.index'))
    ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');
