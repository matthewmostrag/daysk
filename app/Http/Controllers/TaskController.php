<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use Carbon\Carbon;
use App\Services\Tasks\ProgressionCalculator;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        // @todo replace that with a getTodayTasks method somewhere
        $tasks = Task::whereDate('due_date', $today->toDateString())->get();

        $progression = $this->progressionCalculator->getTodayProgression();

        return view('task.index', compact('tasks', 'progression'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('tasks.show', [
            'task' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    /**
     * Mark a task as done.
     *
     * @param \App\Task $task
     */
    public function done(Task $task)
    {
        $task->done();

        return response('task marked as done!', 200);
    }

    /**
     * Mark a task as done.
     *
     * @param \App\Task $task
     */
    public function undone(Task $task)
    {
        $task->undone();

        return response('task marked as undone!', 200);
    }
}
