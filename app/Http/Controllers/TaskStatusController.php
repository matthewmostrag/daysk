<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\Tasks\ProgressionCalculator;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /** @var ProgressionCalculator */
    protected $progressionCalculator;

    public function __construct(ProgressionCalculator $progressionCalculator)
    {
        $this->progressionCalculator = $progressionCalculator;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return string
     */
    public function update(Request $request, Task $task)
    {
        $task->update(array(
            'status' => $request->status
        ));

        return [
            'progression' => $this->progressionCalculator->getTodayProgression(),
            'message' => $this->progressionCalculator->getPerformanceMessage()->message
        ];
    }
}
