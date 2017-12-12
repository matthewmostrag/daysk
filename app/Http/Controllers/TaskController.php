<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use Carbon\Carbon;
use App\Services\Tasks\ProgressionCalculator;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /** @var ProgressionCalculator */
    protected $progressionCalculator;

    public function __construct(ProgressionCalculator $progressionCalculator)
    {
        $this->progressionCalculator = $progressionCalculator;
    }

    /**
     * Display a listing of tasks.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = Task::today()->get();
        $progression = $this->progressionCalculator->getTodayProgression();

        return view('task.index', compact('tasks', 'progression'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTask|Request $request
     * @return Response
     */
    public function store(StoreTask $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreTask $request
     * @param Task $task
     * @return Response
     */
    public function update(StoreTask $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status
        ]);

        return 'ok';

        return redirect()->route('tasks.show', [
            'task' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
