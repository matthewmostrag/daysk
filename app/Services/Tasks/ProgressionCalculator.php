<?php

namespace App\Services\Tasks;

use App\Models\Task;
use Carbon\Carbon;

class ProgressionCalculator
{
    public function getTodayProgression()
    {
        $today = Carbon::today();

        // @todo replace that with a getTodayTasks method somewhere : this needs to be a scope
        $todayTasks = Task::whereDate('due_date', $today->toDateString())->get();
        $tasksCount = $todayTasks->count();
        $tasksDone = $todayTasks->where('status', 1)->count();

        if ($tasksCount === 0) {
            return 0;
        }

        return $tasksDone / $tasksCount * 100;
    }
}
