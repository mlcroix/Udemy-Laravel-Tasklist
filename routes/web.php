<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;


Route::get('/', function () {
    $tasks = Task::all();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::post('/tasks', function (Request $request) {
    $attributes = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::create($attributes);
    $task->save();

    return redirect(route('tasks.show', ['id' => $task->id]))
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::addRoute(['PUT', 'PATCH'], '/tasks/{id}', function (Request $request, $id) {
    $task = Task::findOrFail($id);

    $attributes = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task->update($attributes);

    return redirect(route('tasks.show', ['id' => $task->id]))
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::get('/tasks/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);

    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);

    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');
