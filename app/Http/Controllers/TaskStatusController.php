<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
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

        return 'The task has been updated successfully!';
    }
}
