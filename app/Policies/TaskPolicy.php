<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function manageTask(?User $user, Task $task): bool
    {
        return optional($user)->id === $task->user->id;
    }
}
