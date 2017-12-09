<?php

namespace App\Services\Tasks;

use App\Models\Task;
use Carbon\Carbon;

class ProgressionCalculator
{
    public function getTodayProgression()
    {
        $today = Carbon::today();

        $todayTasks = Task::today()->get();
        $tasksCount = $todayTasks->count();
        $tasksDone = $todayTasks->where('status', 1)->count();

        if ($tasksCount === 0) {
            return 0;
        }

        return $tasksDone / $tasksCount * 100;
    }
}
