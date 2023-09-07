<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

use function Termwind\render;

class TaskController extends Controller
{
    public function userTasks(int $userId): Response
    {
        //add authorization 
        $tasks = User::findOrFail($userId)->tasks();

        return Inertia::render('users/tasks', [
            'tasks' => $tasks
        ]);
    }
}
