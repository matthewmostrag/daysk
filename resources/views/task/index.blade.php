@extends('layout')

@section('content')

    <div class="col">
        @include('partials.date')
        <div class="row">
            <a href="{{ route('tasks.create') }}" class="button"><i class="icon icon-add"></i> Add a new task</a>
        </div>
        @include('partials.progress')
    </div>

    <div class="col col-tasks">
        <ul class="tasks">
            @forelse ($tasks as $task)
                <li class="status-{{ $task->status }}">
                    <div class="task-body">
                        <div class="task-title">
                            {{ $task->title }}
                        </div>
                        <div class="task-description">
                            {{ $task->description }}
                        </div>
                    </div>
                </li>
            @empty
                <li class="no-task"><i class="icon icon-battery"></i> Well, you don't have anything to do today... Let's not be lazy, <a href="{{ route('tasks.create') }}">add a task</a>!</li>
            @endforelse
        </ul>
    </div>

@endsection
