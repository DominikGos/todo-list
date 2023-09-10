<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    public function userTasks(int $userId): Response
    {
        //add authorization
        $tasks = User::findOrFail($userId)->tasks;

        return Inertia::render('Users/Tasks', [
            'tasks' => $tasks
        ]);
    }
}
