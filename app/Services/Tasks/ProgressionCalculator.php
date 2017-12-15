<?php

namespace App\Services\Tasks;

use App\Models\PerformanceMessage;
use App\Models\Task;
use Carbon\Carbon;

class ProgressionCalculator
{
    /**
     * @return float|int
     */
    public function getTodayProgression()
    {
        $todayTasks = Task::today()->get();
        $tasksCount = $todayTasks->count();
        $tasksDone = $todayTasks->where('status', 1)->count();

        if ($tasksCount === 0) {
            return 0;
        }

        return round($tasksDone / $tasksCount * 100);
    }

    /**
     * @return string
     */
    public function getPerformanceMessage()
    {
        $performanceIndex = $this->getPerformanceIndex();

        return PerformanceMessage::where('index', '<=', $performanceIndex)
            ->orderBy('index', 'desc')
            ->first();
    }

    /**
     * @return float
     */
    protected function getPerformanceIndex()
    {
        // We want the time on a 24h day transformed to a time on a 16h day
        $currentHour = Carbon::now()->hour * (2/3);
        $remainingHours = 16 - $currentHour;
        $remainingWork = 100 - $this->getTodayProgression();

        return $remainingWork / $remainingHours;
    }
}
