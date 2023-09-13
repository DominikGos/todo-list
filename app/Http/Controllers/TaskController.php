<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    public function userTasks(int $userId): Response
    {
        //add authorization
        $tasks = User::findOrFail($userId)->tasks()->orderBy('id', 'desc')->get();

        return Inertia::render('Users/Tasks', [
            'tasks' => $tasks
        ]);
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $task = new Task($request->validated());
        $task->user()->associate(Auth::user());
        $task->save();

        return redirect(route('users.tasks.index', ['id' => Auth::id()]))
            ->with('flash_message', 'Added a new task.');
    }

    public function update(UpdateTaskRequest $request, int $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        $task->save();

        return redirect(route('users.tasks.index', ['id' => Auth::id()]))
            ->with('flash_message', 'Updated task.');
    }
}
